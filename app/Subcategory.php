<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    public function tutorials(){
        return $this->hasMany('App\Tutorial');
    }
}
