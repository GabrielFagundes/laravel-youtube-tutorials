<?php

namespace App\Http\Controllers;

use App\Category;
use App\CommunitySugestion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Alert;

class CommunitySugestionsController extends Controller
{
    public function index(Category $category = null){

        $orderBy = request()->exists('popular') ? 'votes_count' : 'updated_at';

        $sugestions = CommunitySugestion::with('user', 'category')
            ->withCount('votes')
            ->forCategory($category)
            ->where('approved' , 1)
            ->orderBy($orderBy, 'desc')
            ->paginate(10);

        $categories = Category::orderBy('description')->get();

        if (request()->exists('popular')){
            $active_popular = 'active';
            $active_recent = '';
        }else{
            $active_recent = 'active';
            $active_popular = '';
        }

        return view('community.index', compact('sugestions', 'categories', 'category', 'active_popular', 'active_recent'));

    }

    public function store(Request $request){

        $user = User::find(Auth::user()->id);

        $this->validate($request, [
            'category_id' => 'required|exists:categories,id',
            'sugestion' => 'required|max:100'
        ]);

        CommunitySugestion::from($user)->contribute($request->all());

        if (!$user->isAdmin())
            Alert::info('Aguarde até que um de nossos administradores realize a aprovação para que a sugestão seja publicada', 'Sua sugestão foi enviada')->persistent("Ok");
        else
            Alert::success('Sua sugestão foi enviada e publicada.');

        return back();

    }

}
