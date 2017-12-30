<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use Translatable;

    public $translatedAttributes = ['name'];
    public $timestamps = false;

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function courses(){
        return $this->hasMany('App\Course');
    }

    public function questions(){
        return $this->hasMany('App\Question');
    }
}
