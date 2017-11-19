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

Route::get('/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

//Posts
Route::get('/admin/posts', 'PostsController@adminIndex')
    ->name('posts.admin.index');

Route::get('/admin/posts/create', 'PostsController@create')
    ->name('posts.create');

Route::get('/admin/posts/edit/{post}', 'PostsController@edit')
    ->name('posts.edit');

Route::get('/admin/posts/show/{post}', 'PostsController@show')
    ->name('posts.show');

Route::get('/admin/posts/get-post-body/{post}', 'PostsController@getPostBody')
    ->name('posts.get_post_body');

Route::post('/admin/posts/store', 'PostsController@store')
    ->name('posts.store');

Route::delete('/admin/posts/delete/{post}', 'PostsController@destroy')
    ->name('posts.delete');

Route::patch('/admin/posts/update/{post}', 'PostsController@update')
    ->name('posts.update');


Route::post('/admin/posts/store_image', 'PostsController@storeImageAjax')
    ->name('posts.store_image');

//Chapters
Route::get('/admin/posts/get-chapters/{course}', 'ChaptersController@getChaptersAjax')
    ->name('posts.get_chapters');
//Courses
Route::get('/admin/posts/get-courses/{category}', 'CoursesController@getCoursesAjax')
    ->name('posts.get_courses');