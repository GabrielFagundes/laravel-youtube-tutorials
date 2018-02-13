<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use App\Tutorial;
use App\User;
use Illuminate\Http\Request;
use App\Youtube;
use Illuminate\Support\Facades\Auth;

class TutorialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function show($videoId){
        $tutorial = Tutorial::where('link', $videoId)->first();
        $channelId = $tutorial->user->channel_id;
        $checkSubscriber = '';
        if (Auth::user()){
            $youtube = new Youtube;
            $checkSubscriber = $youtube->checkIsSubscriber($channelId);
        }

        $youtube = new Youtube();
        $tutorials = Tutorial::orderBy('id', 'DESC')->limit(5)->get();
        $videos = $youtube->returnVideoContent($tutorials);


        return view('tutorial.post')->with(compact('tutorial', 'checkSubscriber', 'videos'));
    }

    public function uploadIndex(){
        $youtube = new Youtube;
        $uploadedVideos = $youtube->returnUploadedVideos();
        $videoContents = $youtube->returnVideoContent($uploadedVideos);

        return view('tutorial.upload')->with(compact('uploadedVideos', 'videoContents'));
    }

    public function uploadCreate(Request $request){
        $video = $request->video;
        $channel = $request->channel;
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('tutorial.completeupload')->with(compact('video', 'categories', 'subcategories', 'channel'));
    }

    public function search(Request $request){

        $busca = $request->busca;
        $youtube = new Youtube();
        $tutorials = Tutorial::whereRaw('LOWER(`title`) LIKE ? ', ['%' .trim(strtolower($busca)).'%'])->orderby('id', 'DESC')->limit(12)->get();
//        dd($tutorials->count());
        $videos = $youtube->returnVideoContent($tutorials);
        return view('tutorial.search')->with(compact('tutorials', 'videos'));
    }

    public function uploadSubmit(Request $request){

        //echo 'teste'; exit;
//
//        $validatedData = $request->validate([
//            'titulo'        => 'required|max:20',
//            'description'   => 'required|max:1000',
//        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if ($user->channel_id == 0){
            $user->channel_id = $request->channel;
            $user->save();
        }

        $tutorial = Tutorial::where('link', $request->video)->first();

        if (!$tutorial){
            $tutorial = new Tutorial;
            $tutorial->title = $request->title;
            $tutorial->description = $request->description;
            $tutorial->link = $request->video;
            $tutorial->category_id = $request->category;
            $tutorial->subcategory_id = $request->subcategory;
            $tutorial->user_id = Auth::user()->id;

            $tutorial->save();
        }
        else {
//            dd($tutorial);
//            echo 'erro';
//            exit;
           return $erro = true;
        }

        return redirect('home');
    }

}
