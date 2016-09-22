<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProflie extends Model
{
    //
    protected $table ='userprofiles';
    public function Author(){
        return $this->belongsTo('App\User','author_id');
    }
}
