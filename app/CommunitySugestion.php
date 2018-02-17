<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunitySugestion extends Model
{

    protected $fillable =[
       'category_id', 'title', 'link'
    ];

    public function user(){

        return $this->belongsTo(User::class);

        redirect(back());

    }
}
