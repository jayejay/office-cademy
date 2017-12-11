<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SearchController extends Controller
{

    /**
     * @param Request $request
     * @param $q
     * @return mixed
     */
    public function find(Request $request, $q = null){

        if($request->ajax()){
            $posts = Post::whereHas('translations', function($query) use ($q){
                $query->where('title', 'ilike', '%' . $q . '%')
    //                  ->orWhere('body', 'ilike', '%' . $q . '%')
                      ->where('locale', App::getLocale());
            })->get();

            $postsArray = [];

            foreach($posts as $post){
                $postsArray[$post->id]['id'] = $post->id;
                $postsArray[$post->id]['title'] = $post->title;
                $postsArray[$post->id]['category_name'] = $post->category->name;
            }

            return $postsArray;
        }
        $q = str_slug($request->q);

        return redirect()->route('posts.admin.index', ["q" => $q, 'search' => 'search']);
    }
}
