<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Youtube;

class TutorialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        $youtube = new Youtube;
        $uploadedVideos = $youtube->returnUploadedVideos();
        $videoContents = $youtube->returnVideoContent($uploadedVideos);
        return view('tutorial.upload')->with(compact('uploadedVideos', 'videoContents'));
    }

    public function upload($videoid){
        $video = $videoid;
        return view('tutorial.completeupload')->with(compact('video'));
    }

    public function save(){



    }


}
