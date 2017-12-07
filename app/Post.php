<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
    use Translatable;

    public $translatedAttributes = ['title', 'body'];

    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'post_translations.title' => 10,
            'post_translations.body' => 5,
        ],
        'joins' => [
            'post_translations' => ['posts.id','post_translations.post_id'],
        ],
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function chapter()
    {
        return $this->belongsTo('App\Chapter');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public function getSlugAttribute($language)
    {
        return str_slug($this->translateOrDefault($language)->title);
    }

    public function getUrlAttribute()
    {
        return action('PostsController@show', [$this->id, $this->slug]);
    }

}
