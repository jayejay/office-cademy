<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;

    public $translatedAttributes = ['name'];

    public function posts(){

        return $this->belongsToMany('App\Post');

    }
}
