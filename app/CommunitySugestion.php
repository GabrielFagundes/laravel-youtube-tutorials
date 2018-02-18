<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunitySugestion extends Model
{

    protected $fillable =[
        'category_id', 'title', 'description'
    ];


    public static function from(User $user){

        $sugestion = new static;

        $sugestion->user_id = $user->id;

        return $sugestion;

    }

    public function contribute($attributes){

        return $this->fill($attributes)->save();

    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function category(){

        return $this->belongsTo(Category::class);

    }

}
