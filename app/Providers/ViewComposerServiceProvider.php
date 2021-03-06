<?php

namespace App\Providers;

use App;
use App\Category;
use App\Chapter;
use App\Course;
use App\Language;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Request;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeViews();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeViews()
    {
        view()->composer('posts.partials.form', function($view){
            $view->with([
                'tags' => Tag::all(),
                'categories' => Category::all(),
                'users' => User::all(),
                'languages' => Language::all(),
                'storedPosts' => Post::all(),
                'courses' => Course::all(),
                'chapters' => Chapter::all(),
            ]);
        });

        view()->composer([
            'posts.*',
            'tags.*',
            'chapters.*',
            'courses.*',
            'categories.*',
            'questions.*',
            'home'
        ], function ($view){
                $view->with([
                   'locale' => App::getLocale(),
                ]);
        });

        view()->composer([
            'layouts.admin_layout',
            'layouts.excel_layout'], function ($view){
                $view->with([
                   'currentPath' => Request::url(),
                   'currentPathName' => Route::currentRouteName(),
                ]);
        });

        view()->composer(['layouts.partials.navigation.courses_dropdown'], function ($view){
                $view->with([
                   'courses' => Course::all(),
                ]);
        });
    }
}
