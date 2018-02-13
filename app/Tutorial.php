<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{

    use Rateable;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function subcategory(){
        return $this->belongsTo('App\Subcategory');
    }

}
