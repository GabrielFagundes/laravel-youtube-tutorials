<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tutorial;
use App\Youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index(Category $category = null)
    {

        $youtube = new Youtube();
        $tutorials = Tutorial::orderBy('id', 'DESC')->limit(12)->get();
        $videos = $youtube->returnVideoContent($tutorials);

        $relativeTutorials = Tutorial::where('category_id', 1)->limit(4)->get();
        $relativeVideos = $youtube->returnVideoContent($relativeTutorials);

        $bestTutorials = $this->getBestTutorials();
        $bestVideos = $youtube->returnVideoContent($bestTutorials);

        $bestTutorial = $this->getBestTutorial();
        $bestVideo = $youtube->returnVideoContent($bestTutorial);
        $bestVideoHome = $bestVideo['items'][0];

//        dd($bestVideoHome);

        return view('home')->with(compact('tutorials', 'videos', 'relativeVideos', 'bestVideos', 'bestVideoHome'));
    }

    public function loadDataAjax(Request $request){
        $output = '';
        $id = $request->id;
        $youtube = new Youtube();

        $tutorials = Tutorial::where('id','<',$id)->orderBy('id','DESC')->limit(12)->get();

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
                $title = getTitle($video->getId());
                $description = cutString($video->getSnippet()->getDescription());
                $time = convtime($video->getContentDetails()->getDuration());
                $views = $video->getStatistics()->getViewCount();
                $publicated_at = formatDate($video->getSnippet()->getPublishedAt(), 'fromISO', $video->getId());

                $output .= '<div class="col-12 col-sm-6 col-md-3">
                                <div class="card card-video">
                                    <div class="card-img">
                                        <a href="video-post.html">
                                            <img src="' . $img . ' ">
                                        </a>
                                        <div class="card-meta">
                                            <span>' . $time . '</span>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <h4 class="card-title"><a href="' . $url . '">' . $title . '</a></h4>
                                        <div class="card-meta">
                                            <span><i class="fa fa-clock-o"></i>  </span>
                                            <span>' . $views . '</span>
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

    public function getBestTutorials(){

        $result = DB::select("select tutorials.id, 
                                     tutorials.title, 
                                     tutorials.description, 
                                     tutorials.link,
                                     avg(ratings.rating) as avgrating from tutorials 
                             join ratings
                             on 	ratings.rateable_id = tutorials.id
                             group by tutorials.id, tutorials.title, tutorials.description
                             order by avgrating desc
                             limit 8");

        return $result;
    }

    public function getBestTutorial(){

        $result = DB::select("select tutorials.id, 
                                     tutorials.title, 
                                     tutorials.description, 
                                     tutorials.link,
                                     avg(ratings.rating) as avgrating from tutorials 
                             join ratings
                             on 	ratings.rateable_id = tutorials.id
                             group by tutorials.id, tutorials.title, tutorials.description
                             order by avgrating desc
                             limit 1");

        return $result;
    }

}
