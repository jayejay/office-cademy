<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    ],
    function()
    {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', function()
        {
            return view('welcome');
        })->name('welcome');

        Route::get('/home', 'HomeController@index')->name('home');

        /*Post routes*/
        Route::get('/admin/posts/list/{search?}/{q?}', 'PostsController@adminIndex')->name('posts.admin.index');
        Route::get('/posts/show/{post}/{slug?}', 'PostsController@show')->name('posts.show');

        Route::get('/admin/posts/new/create', 'PostsController@create')->name('posts.create');

        Route::get('/admin/posts/edit/{post}', 'PostsController@edit')->name('posts.edit');
        Route::get('/admin/posts/get-post-body/{post}', 'PostsController@getPostBody')
            ->name('posts.get_post_body');

        Route::delete('/admin/posts/delete/{post}', 'PostsController@destroy')->name('posts.delete');

        Route::post('/admin/posts/store', 'PostsController@store')
            ->name('posts.store');

        Route::patch('/admin/posts/update/{post}', 'PostsController@update')
            ->name('posts.update');


        /*Users routes*/
        Auth::routes();

        /*Tag routes*/
        Route::get('/admin/tags/index', 'TagsController@adminIndex')->name('tags.admin.index');
        Route::get('/admin/tags/create', 'TagsController@create')->name('tags.create');
        Route::get('/admin/tags/edit/{tag}', 'TagsController@edit')->name('tags.edit');

        Route::patch('/admin/tags/update/{tag}', 'TagsController@update')
            ->name('tags.update');

        Route::post('/admin/tags/store', 'TagsController@store')
            ->name('tags.store');

        Route::delete('/admin/tags/delete/{tag}', 'TagsController@destroy')
            ->name('tags.delete');

        /*Chapter routes*/
        Route::get('admin/chapters/index', 'ChaptersController@adminIndex')->name('chapters.admin.index');
        Route::get('/admin/chapters/create', 'ChaptersController@create')->name('chapters.create');
        Route::get('/admin/chapters/edit/{chapter}', 'ChaptersController@edit')->name('chapters.edit');

        Route::patch('/admin/chapters/update/{chapter}', 'ChaptersController@update')
            ->name('chapters.update');

        Route::post('/admin/chapters/store', 'ChaptersController@store')
            ->name('chapters.store');

        Route::delete('/admin/chapters/delete/{chapter}', 'ChaptersController@destroy')
            ->name('chapters.delete');


        /*Course routes*/
        Route::get('admin/courses/index', 'CoursesController@adminIndex')->name('courses.admin.index');
        Route::get('/admin/courses/create', 'CoursesController@create')->name('courses.create');
        Route::get('/admin/courses/edit/{course}', 'CoursesController@edit')->name('courses.edit');

        Route::patch('/admin/courses/update/{course}', 'CoursesController@update')
            ->name('courses.update');

        Route::post('/admin/courses/store', 'CoursesController@store')
            ->name('courses.store');

        Route::delete('/admin/courses/delete/{course}', 'CoursesController@destroy')
            ->name('courses.delete');

        /*Categories*/
        Route::get('admin/categories/index', 'CategoriesController@adminIndex')->name('categories.admin.index');
        Route::get('/admin/categories/create', 'CategoriesController@create')->name('categories.create');
        Route::get('/admin/categories/edit/{category}', 'CategoriesController@edit')->name('categories.edit');

        Route::patch('/admin/categories/update/{category}', 'CategoriesController@update')
            ->name('categories.update');

        Route::post('/admin/categories/store', 'CategoriesController@store')
            ->name('categories.store');

        Route::delete('/admin/categories/delete/{category}', 'CategoriesController@destroy')
            ->name('categories.delete');

        // Search
        Route::get('find/{q?}', 'SearchController@find')->name('posts.find');

    }
);

Route::post('/admin/posts/store_image', 'PostsController@storeImageAjax')
    ->name('posts.store_image');
//Chapters
Route::get('/admin/posts/get-chapters/{course}', 'ChaptersController@getChaptersAjax')
    ->name('posts.get_chapters');
//Courses
Route::get('/admin/posts/get-courses/{category}', 'CoursesController@getCoursesAjax')
    ->name('posts.get_courses');