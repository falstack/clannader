<?php

namespace App\Providers;

use App\Clannader\Models\Morph\Comment;
use App\Clannader\Models\Post\Post;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Carbon\Carbon::setLocale('zh');

        Relation::morphMap([
            'Comment' => Comment::class,
            'Post' => Post::class,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            $this->app->register(\Mpociot\LaravelTestFactoryHelper\TestFactoryHelperServiceProvider::class);
        }
        // ...
    }
}
