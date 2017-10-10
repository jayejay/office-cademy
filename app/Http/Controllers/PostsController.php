<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Validation\Rule;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminIndex()
    {
        $posts = Post::all();
        return view('posts.admin_index',['posts' => $posts]);
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
        $categories = Category::all();
        $users = User::all();
        return view('posts.create', [
            'post' => $post,
            'tags' => $tags,
            'users' => $users,
            'categories' => $categories,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'course' => 'required',
            'chapter' => 'required'
        ]);

        $post = new Post();

        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;

        if($post->save()){
            Session::flash('flash_message', 'Post has been created');
        }

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
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
        $categories = Category::all();
        $users = User::all();
        $postTagsArray = [];

        //getting the related tag_ids of a certain post
        foreach($postTags as $tag){
            $postTagsArray[] = $tag->pivot->tag_id;
        }
        return view('posts.edit', [
            'post' => $post,
            'tags' => $tags,
            'postTagsArray' => $postTagsArray,
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'max:255', Rule::unique('posts')->ignore($post->id)],
            'body' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'course' => 'required',
            'chapter' => 'required'
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;

        if($post->save()){
            Session::flash('flash_message', 'Post has been updated');
        }

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
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
