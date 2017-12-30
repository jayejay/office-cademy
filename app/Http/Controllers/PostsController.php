<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Language;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Session;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PostsController extends Controller
{
    public function __construct()
    {
        if (App::environment('local')){
//            $this->middleware('guest');
        } else {
            $this->middleware('auth');
        }
    }

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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminIndex(Request $request)
    {
        if (isset($request->q)) {
            $q = str_replace('-', ' ', $request->q);
            $posts = Post::whereHas('translations', function($query) use ($q){
                $query->where('title', 'ilike', '%' . $q . '%')
//                    ->orWhere('body', 'ilike', '%' . $q . '%')
                    ->where('locale', App::getLocale());
            })->get();
        } else {
            $posts = Post::all()->sortBy('id');
        }

        return view('posts.admin_index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, $category, $slug = '')
    {
        if($slug !== $post->getSlugAttribute()){
            return redirect()->to($post->url);
        }
        return view('posts.show', ['post' => $post, 'layout' => 'excel_layout']);
    }

    public function adminShow(Post $post)
    {
        return view('posts.show', ['post' => $post, 'layout' => 'admin_layout']);
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
        $postTagsArray = [];

        //getting the related tag_ids of a certain post
        foreach($postTags as $tag){
            $postTagsArray[] = $tag->pivot->tag_id;
        }
        return view('posts.edit', [
            'post' => $post,
            'postTagsArray' => $postTagsArray,
        ]);
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
            'title' => 'required|max:255',
            'body' => 'required',
            'user_id' => 'required',
//                'chapter_id' => 'required',
        ]);

        $post = new Post();

        $language = App::getLocale();

        $post->translateOrNew($language)->title = $request->title;
        $post->translateOrNew($language)->body = $request->body;
        $post->user_id = $request->user_id;
        //Todo: make chapter_id, course_id and category_id dynamic (if needed)
        $post->chapter_id = 1;
        $post->category_id = 1;
        $post->course_id = 1;
        //Todo: create a field in form and save from request
        $post->translateOrNew($language)->description = 'Test';

        if ($post->save()) {
            Session::flash('flash_message', 'Post has been created');
        }

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.admin.show', ['post' => $post->id]);
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
        try {
            $request->validate([
                'title' => ['required', 'max:255'],
                'body' => 'required',
                'user_id' => 'required',
//                'category_id' => 'required',
//                'chapter_id' => 'required',
            ]);

            $language = App::getLocale();

            $post->translateOrNew($language)->title = $request->title;
            $post->translateOrNew($language)->body = $request->body;
            //Todo: create a field in form and save from request
            $post->translateOrNew($language)->description = 'Test';

            $post->user_id = $request->user_id;
//            $post->chapter_id = $request->chapter_id;
            //todo: Define default for chapter_id
            $post->chapter_id = 1;

            if ($post->save()) {
                Session::flash('flash_message', 'Post has been updated');
            }

            $post->tags()->sync($request->tags);

            return redirect()->route('posts.admin.show', ['post' => $post->id]);

        }catch (\Exception $e) {
            Session::flash('error', 'Oops: '.$e->getMessage());
            return redirect()->route('posts.edit', ['post' => $post->id]);
        }

}

    /**
     * Remove the specified resource from storage.
     * @throws
     * @param  Post $post
     * @return \Redirect
     */
    public function destroy(Post $post)
    {
        $language = App::getLocale();
        $post->deleteTranslations($language);

        if (!$post->hasTranslation($language)){
            Session::flash('flash_message', "Translation (".$language.") of post ". $post->id ." has been deleted");
        }

        if (!$post->translations()->exists()){
            if ($post->delete()) {
                Session::flash('flash_message', 'Post deleted');
            }
        }
        return redirect()->route('posts.admin.index');
    }

    public function storeImageAjax(Request $request)
    {
        $files = $request->file('files');
        $path = [];
        $fileNames = [];

        foreach ($files as $file){
            if (App::environment('local')) {
                $path[] = asset($file->store('images/uploads'));

            } elseif (App::environment('production')) {
                /**
                 * @var $file UploadedFile
                 */
                $imageFileName = $file->getClientOriginalName();
                $fileNames[] = $imageFileName;
                $s3 = Storage::disk('s3');
                $filePath = '/images/' . $imageFileName;
                $s3->put($filePath, file_get_contents($file), 'public');
                $path[] = $s3->url('images/'.$imageFileName);
            }
        }
        return response()->json(["success" => true, "path" => $path, "fileNames" => $fileNames]);
    }

    public function getPostBody(Post $post)
    {
        try {
            return response()->json([
                "success" => true,
                "postBody" => $post->translateOrDefault(App::getLocale())->body,
            ]);
        } catch (\Exception $e) {
            return response()->json(["success" => false, "message" => $e->getMessage()]);
        }
    }

}
