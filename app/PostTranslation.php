<?php
/**
 * Created by PhpStorm.
 * User: Jay
 * Date: 22.11.2017
 * Time: 12:19
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    public $timestamps = false;
    public $fillable = ['title', 'body'];

}