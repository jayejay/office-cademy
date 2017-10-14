<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function posts(){

        return $this->hasMany('App\Post');

    }

    public function chapters(){
        return $this->hasMany('App\Chapter');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
