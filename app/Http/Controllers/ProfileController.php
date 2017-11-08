<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function show($id)
    {
        dd($id);
        if($id != null) {
            $user = User::find($id);
        } else {
            $user = User::find(Auth::user()->id);
        }
        return view('user.profile.complete')->with(compact('user'));
    }

    public function complete(){
        $user = User::find(Auth::user()->id);
        //dd($user);
        return view('user.profile.complete')->with(compact('user'));
    }

    public function update(Request $request){
        dd($request);
        $user->city = $request->city;
    }

    public function teste(){
        echo 'Teste';
    }

}
