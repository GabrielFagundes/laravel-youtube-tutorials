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

    public function upload(){

        $youtube = new Youtube;
        $youtube->returnUploadedVideos();

    }
}
