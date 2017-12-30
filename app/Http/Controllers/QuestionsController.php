<?php

namespace App\Http\Controllers;

use App;
use App\Category;
use App\Question;
use Illuminate\Http\Request;
use Session;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();

        return view('questions.index',['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('questions.create', ['categories' => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'options' => 'required',
            'answer' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        $question = new Question();

        $language = App::getLocale();

        $question->translateOrNew($language)->title = $request->title;
        $question->translateOrNew($language)->options = $request->options;
        $question->translateOrNew($language)->answer = $request->answer;
        $question->category_id = $request->category_id;

        $question->save();

        return redirect()->route('questions.show',['question' => $question->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Question $question)
    {
        return view('questions.show', ['question' => $question, 'layout' => 'admin_layout']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Question $question)
    {
        $categories = Category::all();
        return view('questions.edit', ['question' => $question, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $request->validate([
            'title' => 'required|max:255',
            'options' => 'required',
            'answer' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        $language = App::getLocale();

        $question->translateOrNew($language)->title = $request->title;
        $question->translateOrNew($language)->options = $request->options;
        $question->translateOrNew($language)->answer = $request->answer;
        $question->category_id = $request->category_id;

        $question->save();

        return redirect()->route('questions.show',['question' => $question->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Question $question)
    {
        $language = App::getLocale();
        $question->deleteTranslations($language);

        if (!$question->hasTranslation($language)){
            Session::flash('flash_message', "Translation (".$language.") of question ". $question->id ." has been deleted");
        }

        if (!$question->translations()->exists()){
            if ($question->delete()) {
                Session::flash('flash_message', 'Question deleted');
            }
        }
        return redirect()->route('questions.index');
    }
}
