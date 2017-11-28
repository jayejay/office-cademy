<?php
/**
 * Created by PhpStorm.
 * User: Jay
 * Date: 28.11.2017
 * Time: 19:17
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    public $timestamps = false;
    public $fillable = ['name'];
}