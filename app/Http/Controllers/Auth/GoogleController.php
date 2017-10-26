<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
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
        //dd($google_user);
        
        $user = User::where('email', $google_user_email)->first();

        // register (if no user)
        if (!$user) {
            $user = new User;
            $user->name = $google_user_name;
            $user->email = $google_user_email;
            $user->save();
        }

        // login
        Auth::loginUsingId($user->id);

        session(['google_user_token' => $google_user_token]);
        session(['google_user_avatar' => $google_user_avatar]);
        session(['google_user_avatar_original' => $google_user_avatar_original]);

        return redirect('home');
        // $user->token;
    }
}