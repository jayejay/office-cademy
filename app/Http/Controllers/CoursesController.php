<?php

namespace App\Http\Controllers;

use App\Category;
use Exception;
use Illuminate\Http\Request;
use App\Chapter;
use App\Course;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        //Todo: change view to courses.index
        return view('courses.admin_index',['courses' => $courses]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $courses = Course::all();
        return view('courses.admin_index',['courses' => $courses]);
    }

    public function show(Course $course)
    {
        return view('courses.show', ['course' => $course]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('courses.create', ['categories' => $categories]);
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
            'category_id' => 'required|integer',
        ]);

        $course = new Course();

        $language = App::getLocale();

        $course->translateOrNew($language)->name = $request->name;
        $course->category_id = $request->category_id;

        if ($course->save()) {
            Session::flash('flash_message', 'Course has been created');
        } else {
            Session::flash('error', 'Oops, Something went wrong');
            return redirect()->route('courses.create')->withInput();
        }

        return redirect()->route('courses.admin.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::all();

        return view('courses.edit', [
            'course' => $course,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|integer',
        ]);

        $language = App::getLocale();

        $course->translateOrNew($language)->name = $request->name;
        $course->category_id = $request->category_id;

        if ($course->save()) {
            Session::flash('flash_message', 'Course has been updated');
        } else {
            Session::flash('error', 'Oops, Something went wrong');
            return redirect()->route('courses.edit')->withInput();
        }

        return redirect()->route('courses.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return Response
     * @throws \Exception
     */
    public function destroy(Course $course)
    {
        $language = App::getLocale();
        $course->deleteTranslations($language);

        if (!$course->hasTranslation($language)){
            Session::flash('flash_message', "Translation (".$language.") of course ". $course->id ." has been deleted");
        }

        if (!$course->translations()->exists()){

            try {
                if ($course->delete()) {
                    Session::flash('flash_message', 'Course deleted');
                }
            }  catch (Exception $exception) {
                Session::flash('error', $exception->getMessage());
                return redirect()->route('courses.admin.index');
            }
        }

        return redirect()->route('courses.admin.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCoursesAjax(Request $request)
    {
        try {
        $courses = Course::where('category_id', $request->category_id)->get();
            return response()->json(['success' => true, "courses" => $courses]);
        } catch (\Exception $e){
            return response()->json(['success' => false, "message" => $e->getMessage()]);
        }
    }
}
