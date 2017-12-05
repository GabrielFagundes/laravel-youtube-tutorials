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
        return view('upload')->with(compact('uploadedVideos'));
    }
}
