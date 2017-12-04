<?php
/**
 * Created by PhpStorm.
 * User: Jay
 * Date: 04.12.2017
 * Time: 20:54
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;
    public $fillable = ['name'];

}