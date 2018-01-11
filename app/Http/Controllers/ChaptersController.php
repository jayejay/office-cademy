<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Chapter;
use App\Course;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;


class ChaptersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = Chapter::all();
        return view('chapters.index',['chapters' => $chapters]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $chapters = Chapter::all();
        return view('chapters.admin_index',['chapters' => $chapters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('chapters.create', ['courses' => $courses]);
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
            'number' => 'required|integer',
        ]);

        $chapter = new Chapter();

        $language = App::getLocale();

        $chapter->translateOrNew($language)->name = $request->name;
        $chapter->course_id = $request->course_id;
        $chapter->number = $request->number;
        $chapter->position = $request->position;


        if ($chapter->save()) {
            Session::flash('flash_message', 'Chapter has been created');
        } else {
            Session::flash('error', 'Oops, Something went wrong');
            return redirect()->route('chapters.create')->withInput();
        }

        return redirect()->route('chapters.admin.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        $courses = Course::all();

        return view('chapters.edit', [
            'chapter' => $chapter,
            'courses' => $courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapter $chapter)
    {
        $request->validate([
            'name' => 'required|max:255',
            'number' => 'required|integer',
        ]);

        $language = App::getLocale();

        $chapter->translateOrNew($language)->name = $request->name;
        $chapter->course_id = $request->course_id;
        $chapter->number = $request->number;
        $chapter->position = $request->position;

        if ($chapter->save()) {
            Session::flash('flash_message', 'Chapter has been updated');
        } else {
            Session::flash('error', 'Oops, Something went wrong');
            return redirect()->route('chapters.edit')->withInput();
        }

        return redirect()->route('chapters.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Chapter $chapter
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Chapter $chapter)
    {
            $language = App::getLocale();
            $chapter->deleteTranslations($language);

            if (!$chapter->hasTranslation($language)){
                Session::flash('flash_message', "Translation (".$language.") of chapter ". $chapter->id ." has been deleted");
            }

            if (!$chapter->translations()->exists()){

                try {
                    if ($chapter->delete()) {
                        Session::flash('flash_message', 'Chapter deleted');
                    }
                }  catch (Exception $exception) {
                    Session::flash('error', $exception->getMessage());
                    return redirect()->route('chapters.admin.index');
                }
            }
            return redirect()->route('chapters.admin.index');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getChaptersAjax(Request $request)
    {
        try {
        $chapters = Chapter::where('course_id', $request->course_id)->get();
            return response()->json(['success' => true, "chapters" => $chapters]);
        } catch (\Exception $e){
            return response()->json(['success' => false, "message" => $e->getMessage()]);
        }
    }
}
