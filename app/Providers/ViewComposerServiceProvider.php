<?php

namespace App\Providers;

use App\Category;
use App\Language;
use App\Post;
use App\Tag;
use App\User;
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
        $this->composePostForm();
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

    private function composePostForm()
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
    }
}
