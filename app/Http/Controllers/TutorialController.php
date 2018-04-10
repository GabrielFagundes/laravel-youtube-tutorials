<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use App\Tutorial;
use App\User;
use Illuminate\Http\Request;
use App\Youtube;
use Illuminate\Support\Facades\Auth;
use Alert;

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

    public function search(Request $request){

        $busca = $request->busca;
        $youtube = new Youtube();
        $tutorials = Tutorial::whereRaw('LOWER(`title`) LIKE ? ', ['%' .trim(strtolower($busca)).'%'])->orderby('id', 'DESC')->limit(12)->get();
        $videos = $youtube->returnVideoContent($tutorials);
        return view('tutorial.search')->with(compact('tutorials', 'videos'));
    }

    public function searchByFilter(Category $category = null){

//        dd($category);

        $youtube = new Youtube();
//        $tutorials = Tutorial::whereRaw('LOWER(`title`) LIKE ? ', ['%' .trim(strtolower($busca)).'%'])->orderby('id', 'DESC')->limit(12)->get();

//        $orderBy = request()->exists('popular') ? 'votes_count' : 'updated_at';

        $tutorials = Tutorial::with('category')
            ->forCategory($category)
            ->where('approved' , 'S')
            ->orderBy('id', 'desc')
            ->paginate(10);

        $videos = $youtube->returnVideoContent($tutorials);
        return view('tutorial.search')->with(compact('tutorials', 'videos'));

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

        $tutorials = Tutorial::all();

        foreach ($uploadedVideos['items'] as $video){
            foreach ($tutorials as $tutorial){
                if($video->getSnippet()->getResourceId()->getVideoId() == $tutorial->link){
                    $video->temtutorial = true;
                }
            }
        }

        return view('tutorial.upload')->with(compact('uploadedVideos', 'videoContents'));
    }

    public function uploadCreate(Request $request){
        $video = $request->video;
        $channel = $request->channel;
        $categories = Category::all();
        $subcategories = Subcategory::all();

        $tutorial = Tutorial::where('link', $video)->first();

        if ($tutorial){
            return back();
        }


        return view('tutorial.completeupload')->with(compact('video', 'categories', 'subcategories', 'channel'));
    }

    public function uploadSubmit(Request $request){
//        dd($request);
        $this->validate($request, [
            'title' => 'required|max:40',
            'description' => 'required|max:500',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if ($user->channel_id == 0){
            $user->channel_id = $request->channel;
            $user->save();
        }

        $tutorial = Tutorial::where('link', $request->video)->first();

        if (!$tutorial){

            //Se está sendo inserido pelo administrador, o tutorial vai direto para as publicações,
            // senão usa o valor default = N
            if (!$user->isAdmin())
                $tutorial->approved = 'S';

            $tutorial = new Tutorial;
            $tutorial->title = $request->title;
            $tutorial->description = $request->description;
            $tutorial->link = $request->video;
            $tutorial->category_id = $request->category;
            $tutorial->subcategory_id = $request->subcategory;
            $tutorial->user_id = Auth::user()->id;

            //Salva o tutorial
            $tutorial->save();
        }
        else {
            Alert::error('Houve um erro ao inserir o seu tutorial.');
        }

        if (!$user->isAdmin())
            Alert::info('Aguarde até que um de nossos administradores realize a aprovação para que o TUTORIAL seja publicado', 'Enviado!')->persistent("Ok");
        else
            Alert::success('Seu tutorial foi enviado e publicado.');


        return redirect('/');
    }

}
