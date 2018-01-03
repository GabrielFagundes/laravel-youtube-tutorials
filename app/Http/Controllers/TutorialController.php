<?php

namespace App\Http\Controllers;

use App\Tutorial;
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

    public function save(Request $request){

        $validatedData = $request->validate([
            'titulo'        => 'required|max:20',
            'description'   => 'required|max:1000',
            'link'          => 'required|unique:tutorials|max:30',
        ]);

        $tutorial = Tutorial::where('link', $request->video)->first();

        if (!$tutorial){
            $tutorial = new Tutorial;
            $tutorial->title = $request->title;
            $tutorial->description = $request->description;
            $tutorial->link = $request->video;
            $tutorial->save();
        }
        else {
            $erro = true;
        }

        return redirect('home');
    }

}
