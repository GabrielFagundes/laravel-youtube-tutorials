<?php

namespace App\Http\Controllers;

use App\Tutorial;
use App\Youtube;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youtube = new Youtube();
        $tutorials = Tutorial::all();
        $videos = $youtube->returnVideoContent();
//        dd($videos);

        return view('home')->with(compact('tutorials', 'videos'));
    }
}
