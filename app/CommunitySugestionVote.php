<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunitySugestionVote extends Model
{
    protected $table = 'community_sugestions_votes';

    protected $fillable = ['user_id', 'community_link_id'];

}
