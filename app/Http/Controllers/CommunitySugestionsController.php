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



        $sugestions = CommunitySugestion::with('votes')
            ->forCategory($category)
            ->where('approved' , 1)
            ->latest()
            ->paginate(10);



        $categories = Category::orderBy('description')->get();

        return view('community.index', compact('sugestions', 'categories', 'category'));

    }

    public function store(Request $request){

        $user = User::find(Auth::user()->id);

        $this->validate($request, [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required',
            'description' => 'required'
        ]);

        CommunitySugestion::from($user)->contribute($request->all());

        if (!$user->isAdmin())
            Alert::info('Aguarde até que um de nossos administradores realize a aprovação para que a sugestão seja publicada', 'Sua sugestão foi enviada')->persistent("Ok");
        else
            Alert::success('Sua sugestão foi enviada e publicada.');

        return back();

    }

}
