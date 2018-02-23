<?php

namespace App\Http\Controllers;

use App\Tutorial;
use App\User;
use App\Youtube;
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
            if (Auth::check())
                $user = User::find(Auth::user()->id);
            else
                return back();
        }
        $channelId = $user->channel_id;
        $checkSubscriber = '';
        if (Auth::user()){
            $youtube = new Youtube;
            $checkSubscriber = $youtube->checkIsSubscriber($channelId);
        }

        $youtube = new Youtube();
        $tutorials = Tutorial::where('user_id', $user->id)->orderBy('id', 'DESC')->limit(12)->get();
        $videos = $youtube->returnVideoContent($tutorials);

        $user->avgUserRating = $this->getUserAvgRating($id);

        return view('user.profile.videos')->with(compact('tutorials', 'videos', 'user', 'checkSubscriber'));

    }

    public function loadDataAjax(Request $request){
        $output = '';
        $id = $request->id;
        $user_id = $request->user_id;
        $youtube = new Youtube();

        $tutorials = Tutorial::where(['id','<',$id], ['user_id', $user_id])->orderBy('id','DESC')->limit(12)->get();

        if(!$tutorials->isEmpty())
        {
            $videos = $youtube->returnVideoContent($tutorials);
        }
        foreach($videos as $video)
        {
//                $body = substr(strip_tags($post->body),0,500);
//                $body .= strlen(strip_tags($post->body))>500?"...":"";

            $img = $video->getSnippet()->getThumbnails()->getMedium()->getUrl();
            $url = url('/tutorial/'. $video->getId());
            $title = $video->getSnippet()->getTitle();
            $description = cutString($video->getSnippet()->getDescription());

            $output .= '<div class="col-12 col-sm-6 col-md-3">
                                <div class="card card-video">
                                    <div class="card-img">
                                        <a href="video-post.html">
                                            <img src="' . $img . ' ">
                                        </a>
                                        <div class="card-meta">
                                            <span>15:56</span>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <h4 class="card-title"><a href="' . $url . '">' . $title . '</a></h4>
                                        <div class="card-meta">
                                            <span><i class="fa fa-clock-o"></i> hora </span>
                                            <span>6521 views</span>
                                        </div>
                                        <p>' . $description . '</p>
                                    </div>
                                </div>
                          </div>';
        }
        if ($video['tutorial_id'] > 1){
            $output .= '<div id="remove-row">
                            <button id="btn-more" data-id="'. $video['tutorial_id'].'" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" > Load More </button>
                        </div>';
        }

        return $output;

    }

    public function complete(){
        $this->middleware('auth');

        $user = User::find(Auth::user()->id);

        $channelId = $user->channel_id;
        $checkSubscriber = '';
        if (Auth::user()){
            $youtube = new Youtube;
            $checkSubscriber = $youtube->checkIsSubscriber($channelId);
        }

        return view('user.profile.complete')->with(compact('user', 'checkSubscriber'));
    }

    public function update(Request $request){

        $this->validate($request, [
            'city'        => 'max:40',
            'facebook'    => 'max:40',
            'twitch'      => 'max:40',
            'youtube'     => 'max:40',
            'twitter'     => 'max:40',
            'description' => 'max:100',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->city =        $request->city;
        $user->facebook =    $request->facebook;
        $user->twitch =      $request->twitch;
        $user->youtube =     $request->youtube;
        $user->twitter =     $request->twitter;
        $user->description = $request->description;
        $user->save();

        return back();
    }

    public function getUserAvgRating($user_id){
        $i = 0;
        $rating[] = '';
        $tutorials = Tutorial::where('user_id', $user_id)->get();

        if ($tutorials->count() > 0){
            foreach ($tutorials as $tutorial){
                $rating[$i] = $tutorial->averageRating;
                $i++;
            }
            $rating = array_filter($rating);
            if (count($rating) > 0){
                $avgUserRating = array_sum($rating)/count($rating);
                return $avgUserRating;
            }else{
                return null;
            }
        }

        return null;
    }

}
