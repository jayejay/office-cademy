<?php
/**
 * Created by PhpStorm.
 * User: Jay
 * Date: 29.11.2017
 * Time: 20:44
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChapterTranslation extends Model
{
    public $timestamps = false;
    public $fillable = ['name'];
}