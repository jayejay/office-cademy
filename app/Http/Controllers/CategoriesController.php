<?php

namespace App\Http\Controllers;

use App\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        //Todo: change view to categories.index
        return view('categories.admin_index',['categories' => $categories]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $categories = Category::all();
        return view('categories.admin_index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = new Category();

        $language = App::getLocale();

        $category->translateOrNew($language)->name = $request->name;

        if ($category->save()) {
            Session::flash('flash_message', 'Category has been created');
        } else {
            Session::flash('error', 'Oops, Something went wrong');
            return redirect()->route('categories.create')->withInput();
        }

        return redirect()->route('categories.admin.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $language = App::getLocale();

        $category->translateOrNew($language)->name = $request->name;

        if ($category->save()) {
            Session::flash('flash_message', 'Category has been updated');
        } else {
            Session::flash('error', 'Oops, Something went wrong');
            return redirect()->route('categories.edit')->withInput();
        }

        return redirect()->route('categories.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $language = App::getLocale();
        $category->deleteTranslations($language);

        if (!$category->hasTranslation($language)){
            Session::flash('flash_message', "Translation (".$language.") of category ". $category->id ." has been deleted");
        }

        if (!$category->translations()->exists()){

            try {
                if ($category->delete()) {
                    Session::flash('flash_message', 'Category ' . $category->name . ' deleted');
                }
            }  catch (Exception $exception) {
                Session::flash('error', $exception->getMessage());
                return redirect()->route('categories.admin.index');
            }
        }

        return redirect()->route('categories.admin.index');
    }
}
