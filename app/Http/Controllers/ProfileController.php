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
        //dd($request->city);
        $validatedData = $request->validate([
            'city'        => 'max:50',
            'facebook'    => 'max:50',
            'twitch'      => 'max:50',
            'youtube'     => 'max:50',
            'twitter'     => 'max:50',
            'description' => 'max:200',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->city =        $request->city;
        $user->facebook =    $request->facebook;
        $user->twitch =      $request->twitch;
        $user->youtube =     $request->youtube;
        $user->twitter =     $request->twitter;
        $user->description = $request->description;
        $user->save();
        return view('user.profile.complete')->with(compact('user'));
    }

    public function teste(){
        echo 'Teste';
    }

}
