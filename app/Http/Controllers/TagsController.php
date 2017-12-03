<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index',['tags' => $tags]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $tags = Tag::all();
        return view('tags.admin_index',['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
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
            'name' => 'required|max:255',
        ]);

        $tag = new Tag();

        $language = App::getLocale();

        $tag->translateOrNew($language)->name = $request->name;

        if ($tag->save()) {
            Session::flash('flash_message', 'Tag has been created');
        } else {
            Session::flash('error', 'Oops, Something went wrong');
            return redirect()->route('tags.create')->withInput();
        }

        return redirect()->route('tags.admin.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $language = App::getLocale();

        $tag->translateOrNew($language)->name = $request->name;

        if ($tag->save()) {
            Session::flash('flash_message', 'Tag has been updated');
        } else {
            Session::flash('error', 'Oops, Something went wrong');
            return redirect()->route('tags.edit')->withInput();
        }

        return redirect()->route('tags.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        $language = App::getLocale();
        $tag->deleteTranslations($language);

        if (!$tag->hasTranslation($language)){
            Session::flash('flash_message', "Translation (".$language.") of tag ". $tag->id ." has been deleted");
        }

        if (!$tag->translations()->exists()){
            if ($tag->delete()) {
                Session::flash('flash_message', 'Tag deleted');
            }
        }
        return redirect()->route('tags.admin.index');
    }
}
