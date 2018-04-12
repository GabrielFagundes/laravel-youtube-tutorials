<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;
use Socialite;
use Google_Client;
use Google_Service_Youtube;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email', Google_Service_Youtube::YOUTUBE_FORCE_SSL])
            ->with(["access_type" => "offline", "prompt" => "consent select_account"])
            ->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $google_user = Socialite::driver('google')->user();
        $google_user_email = $google_user->getEmail(); // unique google user email
        $google_user_name = $google_user->getName(); // google user name
        $google_user_avatar = $google_user->avatar; // google user avatar size 50px
        $google_user_avatar_original = $google_user->avatar_original; // google user avatar original size
        $google_user_token = $google_user->token;
        $google_user_expires_in = $google_user->expiresIn;

        if ($google_user->refreshToken){
            $google_user_refresh_token = $google_user->refreshToken;
        }
        //dd($google_user);


        // transforma os tokens recebido pelo socialite para utilização com o client do google
        // este client será utilizado para acessar, na sequencia, o client responsavel pelas requisições à api do youtube
        $google_client_token = [
            'access_token' => $google_user->token,
            'refresh_token' => $google_user->refreshToken,
            'expires_in' => $google_user->expiresIn
        ];

        $user = User::where('email', $google_user_email)->first();

        // register (if no user)
        if (!$user) {
            $user = new User;
            $user->name = $google_user_name;
            $user->email = $google_user_email;
            $user->avatar = $google_user_avatar_original;
            $user->refresh_token = $google_user_refresh_token;
            $user->save();
        }
        else {
            //switch avatar if there's a new url
            $existing_user = User::find($user->id);
            if ($existing_user->avatar <> $google_user_avatar_original){
                $existing_user->avatar = $google_user_avatar_original;
                $existing_user->save();
            }
            if ($google_user_refresh_token){
                $existing_user->refresh_token = $google_user_refresh_token;
                $existing_user->save();
            }
        }

        //cria o client de acesso do google para armazenar na sessão, ele será utilizado em todas as requisições
        //realizadas pelo usuário logado
        $client = new Google_Client();
        $client->setApplicationName("e-dandodicas");
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_APP_SECRET'));
        $client->setDeveloperKey(env('GOOGLE_SERVER_KEY'));
        $client->setAccessToken(json_encode($google_client_token));
        $client->setAccessType('offline');

        // login
        Auth::loginUsingId($user->id);
        session(['google_user_token' => $google_user_token]);
        session(['google_user_refresh_token' => $google_user_refresh_token]);
        session(['google_user_expires_in' => $google_user_expires_in]);
        session(['google_user_avatar' => $google_user_avatar]);
        session(['google_client' => $client]);
        //session(['google_user_avatar_original' => $google_user_avatar_original]);

        return redirect('home');
        // $user->token;
    }
}