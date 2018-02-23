<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{

    use Rateable;

    protected $fillable =[
        'title', 'link', 'description', 'user_id', 'category_id', 'subcategory_id'
    ];

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
