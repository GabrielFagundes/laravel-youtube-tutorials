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

        if ($user->isAdmin()){
            $sugestion->approve();
        }

        return $sugestion;

    }

    public function contribute($attributes){

        return $this->fill($attributes)->save();

    }

    public function scopeForCategory($builder, $category){

        if ($category){
            return $builder->where('category_id', $category->id);
        }

        return $builder;

    }

    public function approve(){

        $this->approved = true;

        return $this;

    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function votes(){
        return $this->hasMany(CommunitySugestionVote::class, 'community_sugestion_id');
    }

}
