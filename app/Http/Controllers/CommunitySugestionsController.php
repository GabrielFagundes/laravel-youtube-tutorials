<?php

namespace App\Http\Controllers;

use App\CommunitySugestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunitySugestionsController extends Controller
{
    public function index(){

        $sugestions = CommunitySugestion::paginate(25);

        return view('community.index', compact('sugestions'));

    }

    public function store(Request $request){

        CommunitySugestion::from(Auth::user())
            ->contibute($request->all());

    }

}
