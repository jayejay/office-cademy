<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function find($q){
        return Post::search($q)
            ->with('course')
            ->with('category')
            ->get();
    }
}
