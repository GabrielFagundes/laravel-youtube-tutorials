<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{

    use Rateable;

    public function user(){
        return $this->belongsTo(User::class);
    }

}
