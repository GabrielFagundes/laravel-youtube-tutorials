<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tutorials(){
        return $this->hasMany('App\Tutorial');
    }

    public function isAdmin(){

        return $this->admin;

    }

    public function votes(){

        return $this->belongsToMany(CommunitySugestion::class, 'community_sugestions_votes')
            ->withTimestamps();

    }

    public function votedFor(CommunitySugestion $sugestion){

        return $sugestion->votes->contains('user_id', $this->id);

    }

}
