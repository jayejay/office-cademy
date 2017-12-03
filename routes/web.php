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
        });

        Route::get('/home', 'HomeController@index')
            ->name('home');

        /*Post routes*/
        Route::get('/admin/posts', 'PostsController@adminIndex')
            ->name('posts.admin.index');

        Route::get('/posts/show/{post}/{slug?}', 'PostsController@show')
            ->name('posts.show');

        Route::get('/admin/posts/edit/{post}', 'PostsController@edit')
            ->name('posts.edit');

        Route::delete('/admin/posts/delete/{post}', 'PostsController@destroy')
            ->name('posts.delete');

        Route::post('/admin/posts/store', 'PostsController@store')
            ->name('posts.store');

        Route::patch('/admin/posts/update/{post}', 'PostsController@update')
            ->name('posts.update');

        Route::get('/admin/posts/get-post-body/{post}', 'PostsController@getPostBody')
            ->name('posts.get_post_body');

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

        /*Course routes*/
        Route::get('admin/courses/index', 'CoursesController@adminIndex')->name('courses.admin.index');

    }
);

//Posts

Route::get('/admin/posts/create', 'PostsController@create')
    ->name('posts.create');



Route::post('/admin/posts/store_image', 'PostsController@storeImageAjax')
    ->name('posts.store_image');

//Tags


//Chapters
Route::get('/admin/posts/get-chapters/{course}', 'ChaptersController@getChaptersAjax')
    ->name('posts.get_chapters');
//Courses
Route::get('/admin/posts/get-courses/{category}', 'CoursesController@getCoursesAjax')
    ->name('posts.get_courses');