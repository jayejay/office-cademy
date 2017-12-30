<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionTranslation extends Model
{

    public $timestamps = false;
    public $fillable = ['options', 'answer', 'title'];

    public function setOptionsAttribute($options)
    {
        $this->attributes['options'] = json_encode($options);
    }

}
