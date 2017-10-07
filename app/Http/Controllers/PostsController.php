<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $tags = Tag::all();
        return view('posts.create', ['post' => $post, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $request->validate([
           'title' => 'required|unique:posts|max:255',
           'body' => 'required',
        ]);

        $post = new Post();

        $post->title = $request->title;
        $post->body = $request->body;
        //Todo user_id and category_id should be selectable
        $post->user_id = 1;
        $post->category_id = 1;

        if($post->save()){
            Session::flash('flash_message', 'Post has been created');
        }

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $postTags = $post->tags;
        $tags = Tag::all();
        $postTagsArray = [];

        //getting the related tag_ids of a certain post
        foreach($postTags as $tag){
            $postTagsArray[] = $tag->pivot->tag_id;
        }
        return view('posts.edit', ['post' => $post, 'tags' => $tags, 'postTagsArray' => $postTagsArray]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->delete()){
            Session::flash('flash_message', 'Post deleted');
        }

        return redirect()->route('posts.index');
    }

    public function storeImageAjax(Request $request){

        $files = $request->file('files');

        $path = [];

        foreach ($files as $file){
            $path[] = asset($file->store('images'));
        }

        return response()->json(["success" => true, "path" => $path]);
    }
}
