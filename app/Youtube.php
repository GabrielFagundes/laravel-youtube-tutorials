<?php

namespace App;

use Google_Service_Youtube;

class Youtube
{
    public function  __construct()
    {
    }

    public function returnUploadedVideos()
    {

        /////////////////////////////////////
        $client = session('google_client');
        $youtube = new Google_Service_YouTube($client);
        // Define an object that will be used to make all API requests.
        //Ajustar
        /////////////////////////////////////


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

//                dd($playlistItemsResponse->getSnippet()->getPublishedAt());
//                $playlistItemsResponse->getItems()->getSnippet()->getThumbnails()->getDefault()->getUrl();
//                dd($playlistItemsResponse->getItems()->getSnippet()->getResourceId()->getVideoId());
                return $playlistItemsResponse;
            }
        }
    }

    public function returnVideoContent(){



        /////////////////////////////////////
//        $client = session('google_client');

        $client = new \Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_APP_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_NOUSER'));
        $client->setDeveloperKey(env('GOOGLE_SERVER_KEY'));
        $client->setScopes('https://www.googleapis.com/auth/youtube');
//        dd($client);

        $youtube = new Google_Service_YouTube($client);
        // Define an object that will be used to make all API requests.
        //Ajustar
        /////////////////////////////////////

        $tutorials = Tutorial::all();

        $videoIDs = '';
        foreach ($tutorials  as $tutorial) {
            $videoIDs = $videoIDs . $tutorial->link . ',';
        }
            $videoResponse = $youtube->videos->listVideos('contentDetails, statistics, snippet, id', array(
                'id' => $videoIDs));

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
}
