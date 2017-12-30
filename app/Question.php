<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;


class Question extends Model
{
    use Translatable;
    public $translatedAttributes = ['options', 'answer', 'title'];

    protected $casts = [
        'options' => 'array'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }


}
