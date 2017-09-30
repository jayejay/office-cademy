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

Route::get('/', function () {
    return view('welcome');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Post
Route::get('/admin/posts/create', 'PostsController@create')->name('posts.create');
Route::post('/admin/posts/store', 'PostsController@store')->name('posts.store');
Route::post('/admin/posts/store_image', 'PostsController@storeImageAjax')->name('posts.store_image');
