<?php

namespace App\Providers;

use App;
use App\Category;
use App\Language;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

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
                   'currentPath' => Route::currentRouteName(),
                ]);
        });
    }
}
