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
use PDF;
use Session;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function __construct()
    {
        if (App::environment('local')) {
//            $this->middleware('guest');
        } else {
            $this->middleware('auth');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = str_replace('-', ' ', $request->q);
        $posts = Post::whereHas('translations', function ($query) use ($q) {
            $query->where('title', 'ilike', '%' . $q . '%')
//                    ->orWhere('body', 'ilike', '%' . $q . '%')
                ->where('locale', App::getLocale())
                ->where('searchable', 1);
        })->get();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminIndex(Request $request)
    {
        if (isset($request->q)) {
            $q = str_replace('-', ' ', $request->q);
            $posts = Post::whereHas('translations', function ($query) use ($q) {
                $query->where('title', 'ilike', '%' . $q . '%')
//                    ->orWhere('body', 'ilike', '%' . $q . '%')
                    ->where('locale', App::getLocale())
                    ->orderBy('course_id')
                    ->orderBy('chapter_id');
            })->get();
        } else {
            $posts = Post::orderBy('chapter_id')
                ->orderBy('position')
                ->get();
        }

        $courses = Course::all();
        $categories = Category::all();

        return view('posts.admin_index', [
            'posts' => $posts,
            'courses' => $courses,
            'categories' => $categories
        ]);
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
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, $slug = '')
    {
        if ($slug !== $post->getSlugAttribute()) {
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
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $postTags = $post->tags;
        $postTagsArray = [];

        //getting the related tag_ids of a certain post
        foreach ($postTags as $tag) {
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);

        $post = new Post();

        $language = App::getLocale();

        $post->translateOrNew($language)->title = $request->title;
        $post->translateOrNew($language)->body = $request->body;
        $post->translateOrNew($language)->description = 'Test';
        $post->user_id = $request->user_id;
        $post->chapter_id = isset($request->chapter_id) ? $request->chapter_id : null;
        $post->category_id = $request->category_id;
        $post->course_id = $request->course_id;
        $post->position = $request->position;
        $post->searchable = ($request->searchable == 1) ? true : false;

        if ($post->save()) {
            Session::flash('flash_message', 'Post has been created');
        }

        $post->tags()->attach($request->tags);

        return redirect()->route('posts.admin.show', ['post' => $post->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        try {
            $request->validate([
                'title' => ['required', 'max:255'],
                'body' => 'required',
                'user_id' => 'required',
                'category_id' => 'required',
            ]);

            $language = App::getLocale();

            $post->translateOrNew($language)->title = $request->title;
            $post->translateOrNew($language)->body = $request->body;
            $post->translateOrNew($language)->description = 'Test';
            $post->user_id = $request->user_id;
            $post->chapter_id = isset($request->chapter_id) ? $request->chapter_id : null;
            $post->category_id = $request->category_id;
            $post->course_id = $request->course_id;
            $post->position = $request->position;
            $post->searchable = ($request->searchable == 1) ? true : false;


            if ($post->save()) {
                Session::flash('flash_message', 'Post has been updated');
            }

            $post->tags()->sync($request->tags);

            return redirect()->route('posts.admin.show', ['post' => $post->id]);

        } catch (\Exception $e) {
            Session::flash('error', 'Oops: ' . $e->getMessage());
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

        if (!$post->hasTranslation($language)) {
            Session::flash('flash_message', "Translation (" . $language . ") of post " . $post->id . " has been deleted");
        }

        if (!$post->translations()->exists()) {
            if ($post->delete()) {
                Session::flash('flash_message', 'Post deleted');
            }
        }
        return redirect()->route('posts.admin.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeImageAjax(Request $request)
    {
        $files = $request->file('files');
        $path = [];
        $fileNames = [];

        foreach ($files as $file) {
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
                $path[] = $s3->url('images/' . $imageFileName);
            }
        }
        return response()->json(["success" => true, "path" => $path, "fileNames" => $fileNames]);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * @param Request $request
     * @return string
     */
    public function getPostsIndexHtml(Request $request)
    {
        $categoryId = $request->category_id;
        $courseId = $request->course_id;
        $chapterId = $request->chapter_id;

        if (isset($chapterId)) {

            if ($chapterId === "without-chapter") {
                $posts = Post::whereNull('chapter_id')->get();
            } else {
                $posts = Post::where('chapter_id', $chapterId)->get();
            }

        } elseif (isset($courseId)) {
            $posts = Post::where('course_id', $courseId)->get();
        } elseif (isset($categoryId)) {
            $posts = Post::where('category_id', $categoryId)->get();
        } else {
            $posts = Post::all();
        }

        $view = View::make('posts.partials.post_panel', ['posts' => $posts]);

        return $view->render();
    }

    /**
     * @param Post $post
     * @return \PDF;
     */
    public function getPostAsPdf(Post $post)
    {
//        $pdf = App::make('dompdf.wrapper');
//        $postHtml = "<h1>$post->title</h1>" . $post->body;
//        $pdf->loadHTML($postHtml);
//
//        return $pdf->stream();

        $pdf = PDF::loadView('pdf.posts.pdf_show', ['post' => $post]);
        $fileName = $post->title.".pdf";

        return $pdf->stream($fileName);
    }
}
