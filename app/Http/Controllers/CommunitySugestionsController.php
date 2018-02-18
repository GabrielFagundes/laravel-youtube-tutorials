<?php

namespace App\Http\Controllers;

use App\Category;
use App\CommunitySugestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunitySugestionsController extends Controller
{
    public function index(){

        $sugestions = CommunitySugestion::paginate(25);
        $categories = Category::orderBy('description')->get();

        return view('community.index', compact('sugestions', 'categories'));

    }

    public function store(Request $request){

        $this->validate($request, [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required',
            'description' => 'required'
        ]);

        CommunitySugestion::from(Auth::user())->contribute($request->all());

        return back();

    }

}
