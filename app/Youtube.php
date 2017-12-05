<?php

namespace App;

use Google_Service_Youtube;

class Youtube
{

    public function returnUploadedVideos()
    {

        $client = session('google_client');
        // Define an object that will be used to make all API requests.
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

                $playlistItemsResponse = $youtube->playlistItems->listPlaylistItems('snippet', array(
                    'playlistId' => $uploadsListId,
                    'maxResults' => 50
                ));

                return $playlistItemsResponse;

//               foreach ($playlistItemsResponse['items'] as $item) {
//                    echo $item->getSnippet()->getResourceId()->getVideoId();
//                    echo '<img src=' . $item->getSnippet()->getThumbnails()->getMedium()->getUrl() . '></img>';
//                }
//                dd($playlistItemsResponse);
//                $playlistItemsResponse->getItems()->getSnippet()->getThumbnails()->getDefault()->getUrl();
            }
        }
    }
}
