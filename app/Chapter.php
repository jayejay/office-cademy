<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use Translatable;

    public $translatedAttributes = ['name'];

    public function posts(){

        return $this->hasMany('App\Post');

    }

    public function course(){
        return $this->belongsTo('App\Course');
    }
}
