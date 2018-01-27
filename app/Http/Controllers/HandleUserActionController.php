<?php

namespace App\Http\Controllers;

use App\Youtube;
use Illuminate\Http\Request;

class HandleUserActionController extends Controller
{
    public function subscribeUserToChannel(Request $request){

        $channelId = $request->channelid;
        $youtube = new Youtube;
        $youtube->subscribeChannel($channelId);

    }
}
