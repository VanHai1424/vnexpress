<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('clients.blocks.sidebar', function ($view) {
            $mostViewPosts = Post::whereDate('created_at', Carbon::today())
            ->orderBy('view', 'desc')
            ->take(5)
            ->get();
            $view->with('mostViewPosts', $mostViewPosts);
        });

        View::composer('clients.blocks.new_posts', function ($view) {
            $newPosts = Post::latest()->take(3)->get();

            $view->with('newPosts', $newPosts);
        });

        View::composer('clients.blocks.header', function ($view) {
            $categories = Category::whereHas('posts')->get();

            $view->with('categories', $categories);
        });
    }
}
