<?php

namespace App\Http\Controllers;

use App\CommunitySugestion;
use App\CommunitySugestionVote;
use Illuminate\Http\Request;

class VotesController extends Controller
{

    public function __construct(){

        $this->middleware('auth');

    }

    public function store(CommunitySugestion $sugestion){

        CommunitySugestionVote::firstOrNew([
            'user_id' => auth()->id(),
            'community_sugestion_id' => $sugestion->id
        ])->toggle();

        return back();

    }
}
