<?php
use Carbon\Carbon;

function cutString($string){

    $stringFormatted = $string;

    if (strlen($string) > 40)
        $stringFormatted = substr($string, 0, 37) . '...';

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

function formatDate($date, $type, $videoID = null){
    Carbon::setLocale('pt_BR');

    switch ($type){
        case 'commum':
            $date = date_format($date, 'd-m-Y');
            return $date;

        case 'formattedString':
            Carbon::setLocale('pt_BR');
            $carbon = new Carbon($date);
            $formattedDate = $carbon->toFormattedDateString($date);
            return $formattedDate;

        case 'humans':
            $carbon = new Carbon($date);
            $formattedDate = $carbon->diffForHumans();
            return $formattedDate;

        case 'fromISO':
            $tutorial = \App\Tutorial::where('link', $videoID)->first();
            $date = $tutorial->created_at;
            $carbon = new Carbon($date);
            $formattedDate = $carbon->diffForHumans();
            return $formattedDate;
    }


}

function getTitle($link){

    $videoId = $link;

    $tutorial = \App\Tutorial::where('link', $videoId)->first();


    return $tutorial->title;

}