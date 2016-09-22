<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function Author(){
        return $this->belongsTo('App\User','author_id');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
