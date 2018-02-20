<?php

namespace App\Http\Controllers;

use App\Tutorial;
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

    public function tutorialRating(Request $request){

        $tutorial_id = $request->id;
        $rate = $request->value;

        $tutorial = Tutorial::find($tutorial_id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $rate;
        $rating->user_id = \Auth::id();

        try{
            $tutorial->ratings()->save($rating);
            return \GuzzleHttp\json_encode('Rating inserido com sucesso!');
        }catch (\mysqli_sql_exception $e){
            return \GuzzleHttp\json_encode('Ocorreu um erro ao tentar gravar o rating');
        }
    }

}
