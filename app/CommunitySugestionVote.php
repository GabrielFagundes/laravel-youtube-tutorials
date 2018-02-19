<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunitySugestionVote extends Model
{
    protected $table = 'community_sugestions_votes';

    protected $fillable = ['user_id', 'community_sugestion_id'];

    public function toggle(){

        if ($this->exists) {
            return $this->delete();
        }

        return $this->save();
    }

}
