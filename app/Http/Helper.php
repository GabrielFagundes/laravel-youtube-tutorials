<?php

function cutString($string){

    $stringFormatted = $string;

    if (strlen($string) > 100)
        $stringFormatted = substr($string, 0, 97) . '...';

    return $stringFormatted ;

}

/**
 * Refresh User's Google OAuth2 Access Token
 */
function refreshGoogle()
{
    $expiresIn = session('google_user_expires_in');

    // Time
    $current = \Carbon\Carbon::now();
    $expired = Auth::user()->updated_at->addSeconds($expiresIn);
    $refresh_token = Auth::user()->refresh_token;

    // dd($current,$expired);
    // If current date exceeds expired date request new access token
    if($current > $expired) {
//    dd($current);
        // Set Client
        $client = new \Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_APP_SECRET'));
        $client->refreshToken($refresh_token);
        $client->setAccessType('offline');

        $google_client_token = [
            'access_token' => $client->getAccessToken(),
            'refresh_token' => $refresh_token,
            'expires_in' => $expiresIn
        ];
        $client->setAccessToken(json_encode($google_client_token));
        session(['google_client' => $client]);
        return $client->getAccessToken();
    }

    return false;
}