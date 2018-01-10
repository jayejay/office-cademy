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
        Route::get('/', function(){return view('welcome');})->name('welcome');

        Route::get('/about', function(){return view('static_pages/about_us');})->name('about.us');

        Route::get('/home', 'HomeController@index')->name('home');

        /*Post routes*/
        Route::get('/articles/list/{search?}/{q?}', 'PostsController@index')->name('posts.index');
        Route::get('/article/{post?}/{slug?}', 'PostsController@show')->name('posts.show');


        /*Users routes*/
        Auth::routes();


        /*Search*/
        Route::get('/find/{q?}', 'SearchController@find')->name('posts.find');

        Route::group(
            [
                'prefix' => 'admin',
            ],
            function(){

                /*Posts*/
                Route::get('posts/list/{search?}/{q?}', 'PostsController@adminIndex')->name('posts.admin.index');
                Route::get('posts/show/{post?}', 'PostsController@adminShow')->name('posts.admin.show');
                Route::get('posts/new/create', 'PostsController@create')->name('posts.admin.create');
                Route::get('posts/edit/{post}', 'PostsController@edit')->name('posts.edit');
                Route::delete('/admin/posts/delete/{post}', 'PostsController@destroy')->name('posts.delete');
                Route::post('/admin/posts/store', 'PostsController@store')->name('posts.store');
                Route::patch('/admin/posts/update/{post}', 'PostsController@update')->name('posts.update');
                Route::get('ajax/get-post-body/{post}', 'PostsController@getPostBody')->name('posts.get_post_body');

                /*Tag*/
                Route::get('tags/index', 'TagsController@adminIndex')->name('tags.admin.index');
                Route::get('tags/create', 'TagsController@create')->name('tags.create');
                Route::get('tags/edit/{tag}', 'TagsController@edit')->name('tags.edit');
                Route::patch('tags/update/{tag}', 'TagsController@update')->name('tags.update');
                Route::post('tags/store', 'TagsController@store')->name('tags.store');
                Route::delete('tags/delete/{tag}', 'TagsController@destroy')->name('tags.delete');

                /*Chapter*/
                Route::get('chapters/index', 'ChaptersController@adminIndex')->name('chapters.admin.index');
                Route::get('chapters/create', 'ChaptersController@create')->name('chapters.create');
                Route::get('chapters/edit/{chapter}', 'ChaptersController@edit')->name('chapters.edit');
                Route::patch('chapters/update/{chapter}', 'ChaptersController@update')->name('chapters.update');
                Route::post('chapters/store', 'ChaptersController@store')->name('chapters.store');
                Route::delete('chapters/delete/{chapter}', 'ChaptersController@destroy')->name('chapters.delete');


                /*Course*/
                Route::get('courses/index', 'CoursesController@adminIndex')->name('courses.admin.index');
                Route::get('courses/create', 'CoursesController@create')->name('courses.create');
                Route::get('courses/edit/{course}', 'CoursesController@edit')->name('courses.edit');
                Route::patch('courses/update/{course}', 'CoursesController@update')->name('courses.update');
                Route::post('courses/store', 'CoursesController@store')->name('courses.store');
                Route::delete('courses/delete/{course}', 'CoursesController@destroy')->name('courses.delete');

                /*Categories*/
                Route::get('categories/index', 'CategoriesController@adminIndex')->name('categories.admin.index');
                Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
                Route::get('categories/edit/{category}', 'CategoriesController@edit')->name('categories.edit');
                Route::patch('categories/update/{category}', 'CategoriesController@update')->name('categories.update');
                Route::post('categories/store', 'CategoriesController@store')->name('categories.store');
                Route::delete('categories/delete/{category}', 'CategoriesController@destroy')->name('categories.delete');

                /*Questions*/
                Route::get('questions/index','QuestionsController@index')->name('questions.index');
                Route::get('questions/create','QuestionsController@create')->name('questions.create');
                Route::post('questions/store','QuestionsController@store')->name('questions.store');
                Route::patch('questions/update/{question}','QuestionsController@update')->name('questions.update');
                Route::get('questions/edit/{question}','QuestionsController@edit')->name('questions.edit');
                Route::get('questions/show/{question}','QuestionsController@show')->name('questions.show');
                Route::delete('questions/delete/{question}','QuestionsController@destroy')->name('questions.delete');
                Route::get('questions/get-questions', 'QuestionsController@getQuestions')->name('questions.get_questions');

                /*search*/
                Route::get('find/{q?}', 'SearchController@adminFind')->name('posts.admin.find');
            }
        );



    }
);

/*Ajax*/
Route::post('/admin/posts/store_image', 'PostsController@storeImageAjax')->name('posts.store_image');
//Chapters
Route::get('/admin/posts/get-chapters/{course}', 'ChaptersController@getChaptersAjax')->name('posts.get_chapters');
//Courses
Route::get('/admin/posts/get-courses/{category}', 'CoursesController@getCoursesAjax')->name('posts.get_courses');