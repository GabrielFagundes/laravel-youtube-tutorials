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
        $tutorials = Tutorial::orderBy('id', 'DESC')->limit(30)->get();
//        dd($tutorials);
        $videos = $youtube->returnVideoContent($tutorials);
//                dd($videos);

        return view('home')->with(compact('tutorials', 'videos'));
    }

    public function loadDataAjax(Request $request){
        $output = '';
        $id = $request->id;
        $youtube = new Youtube();

        $tutorials = Tutorial::where('id','<',$id)->orderBy('id','DESC')->limit(30)->get();

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
}
