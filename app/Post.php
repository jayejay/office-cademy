<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function category(){

        return $this->belongsTo('App\Category');

    }

    public function chapter(){

        return $this->belongsTo('App\Chapter');

    }

    public function course(){

        return $this->belongsTo('App\Course');

    }

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function tags(){

        return $this->belongsToMany('App\Tag');

    }

    public function language(){
        return $this->belongsTo('App\Language');
    }

}
