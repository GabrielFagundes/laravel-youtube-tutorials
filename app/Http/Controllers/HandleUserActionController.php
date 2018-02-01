<?php

namespace App\Http\Controllers;

use App\Youtube;
use Illuminate\Http\Request;

class HandleUserActionController extends Controller
{
    public function subscribeUserToChannel(Request $request){

        $channelId = $request->id;
        $youtube = new Youtube;
        $response = $youtube->subscribeChannel($channelId);

        return \GuzzleHttp\json_encode($response);

    }

    public function unsubscribeUserFromChannel(Request $request){
        $subscriptionId = $request->id;
        $youtube = new Youtube;
        $response = $youtube->unsubscribeChannel($subscriptionId);

        return \GuzzleHttp\json_encode($response);

    }

}
