<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tutorials(){
        return $this->hasMany('App\Tutorial');
    }
}
