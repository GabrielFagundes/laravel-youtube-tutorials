<?php

namespace App;

use App\Http\Controllers\Auth\GoogleController;
use Google_Service_Youtube;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Youtube
{
    public function  __construct()
    {
        if (!Auth::guest()){
            refreshGoogle();
        }
    }

    public function returnUploadedVideos()
    {

        $client = session('google_client');
        //dd($client);
        $youtube = new Google_Service_YouTube($client);

        if ($client->getAccessToken()) {
            $channelsResponse = $youtube->channels->listChannels('contentDetails', array(
                'mine' => 'true',
            ));

            foreach ($channelsResponse['items'] as $channel) {
                // Extract the unique playlist ID that identifies the list of videos
                // uploaded to the channel, and then call the playlistItems.list method
                // to retrieve that list.
                $uploadsListId = $channel['contentDetails']['relatedPlaylists']['uploads'];

                $playlistItemsResponse = $youtube->playlistItems->listPlaylistItems('snippet, contentDetails', array(
                    'playlistId' => $uploadsListId,
                    'maxResults' => 50
                ));

                //dd($playlistItemsResponse->getSnippet()->getPublishedAt());
                //$playlistItemsResponse->getItems()->getSnippet()->getThumbnails()->getDefault()->getUrl();
                //dd($playlistItemsResponse->getItems()->getSnippet()->getResourceId()->getVideoId());
                //dd($playlistItemsResponse);
                return $playlistItemsResponse;
            }
        }
    }

    public function returnVideoContent($tutorials){

        $videoIDs = '';

        // Define an object that will be used to make all API requests.
        $client = new \Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_APP_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_NOUSER'));
        $client->setDeveloperKey(env('GOOGLE_SERVER_KEY'));
        $client->setScopes('https://www.googleapis.com/auth/youtube');
        $youtube = new Google_Service_YouTube($client);

        foreach ($tutorials  as $tutorial) {
            $videoIDs = $videoIDs . $tutorial->link . ',';
        }
            $videoResponse = $youtube->videos->listVideos('contentDetails, statistics, snippet, id', array(
                'id' => $videoIDs));

        foreach ($tutorials  as $tutorial){

            foreach($videoResponse['items'] as $video){
                if($video->id == $tutorial->link){
                    $video['tutorial_id'] = $tutorial->id;
                }
            }

        }
//            foreach ($videoResponse['items'] as $video){
//                $durationISO = $video->getContentDetails()->getDuration();
//                $di = new \DateInterval($durationISO);
//                $string = '';
//
//                if ($di->h > 0) {
//                    $string .= $di->h.':';
//                }
//                $duration = $string.$di->i.':'.$di->s;
//                $viewCount = $video->getStatistics()->getViewCount();
//
//                $response = array(
//                    'duration' => $duration,
//                    'viewCount' => $viewCount);
//            }
//dd($videoResponse);

            return $videoResponse;
        }

    public function subscribeChannel($channelId){
        $error = "";
        $client = session('google_client');
        $youtube = new Google_Service_YouTube($client);

        if ($client->getAccessToken()) {
            try {
                // This code subscribes the authenticated user to the specified channel.

                // Identify the resource being subscribed to by specifying its channel ID
                // and kind.
                $resourceId = new \Google_Service_YouTube_ResourceId();
                $resourceId->setChannelId($channelId);
                $resourceId->setKind('youtube#channel');

                // Create a snippet object and set its resource ID.
                $subscriptionSnippet = new \Google_Service_YouTube_SubscriptionSnippet();
                $subscriptionSnippet->setResourceId($resourceId);

                // Create a subscription request that contains the snippet object.
                $subscription = new \Google_Service_YouTube_Subscription();
                $subscription->setSnippet($subscriptionSnippet);

                // Execute the request and return an object containing information
                // about the new subscription.
                $subscriptionResponse = $youtube->subscriptions->insert('id,snippet',
                    $subscription, array());


            } catch (Google_ServiceException $e) {
                $error .= sprintf('<p>A service error occurred: <code>%s</code></p>',
                    htmlspecialchars($e->getMessage()));
            } catch (Google_Exception $e) {
                $error .= sprintf('<p>An client error occurred: <code>%s</code></p>',
                    htmlspecialchars($e->getMessage()));
            }
        } else {
            // If the user hasn't authorized the app, initiate the OAuth flow
            $google = new GoogleController();
            $google->redirectToProvider();
        }

//        dd($subscriptionResponse);
        return $subscriptionResponse;

    }

    public function checkIsSubscriber($videoPostChannel){
        $error = "";
        $client = session('google_client');
        $youtube = new Google_Service_YouTube($client);

        if ($client->getAccessToken()) {
            $listSubscriptions = $youtube->subscriptions->listSubscriptions('snippet', array(
                    'forChannelId' => $videoPostChannel,
                    'mine' => 'true'
                )
            );

            foreach ($listSubscriptions['items'] as $subscription){
                if ($subscription->getSnippet()->getChannelId())
                    return $subscription->getId();
                else
                    return false;
            }
        }

        return false;

    }

    public function unsubscribeChannel($subscriptionId){
        $error = "";
        $client = session('google_client');
        $youtube = new Google_Service_YouTube($client);

        if ($client->getAccessToken()) {
            try {

                $unsubscriptionResponse = $youtube->subscriptions->delete($subscriptionId, array());

            } catch (Google_ServiceException $e) {
                $error .= sprintf('<p>A service error occurred: <code>%s</code></p>',
                    htmlspecialchars($e->getMessage()));
            } catch (Google_Exception $e) {
                $error .= sprintf('<p>An client error occurred: <code>%s</code></p>',
                    htmlspecialchars($e->getMessage()));
            }
        } else {
            // If the user hasn't authorized the app, initiate the OAuth flow
            GoogleController::redirectToProvider();
        }

//        dd($unsubscriptionResponse);
        return $unsubscriptionResponse;


    }
}
