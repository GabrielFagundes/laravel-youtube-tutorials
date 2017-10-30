<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if($id != null) {
            $user = User::find($id);
        } else {
            $user = User::find(Auth::user()->id);
        }
        $user = User::find($id);
        return view('user.profile')->with(compact('user'));
    }
}
