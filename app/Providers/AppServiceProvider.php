<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\HeroImage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        view()->composer(['blog.layouts.sidebar-single', 'blog.layouts.sidebar-home'], function($view) { 
            if (Cache::has('cats')) {
                $cats = Cache::get('cats');
            }
            else {
                $cats = Category::withCount('posts')->get();
                Cache::put('cats', $cats, 30);
            }

            $view->with(
                [
                    'cats' => $cats,
                    'popular_posts' => Post::orderBydesc('views')->limit(3)->get(),
                ]   
            );
        });

        view()->composer(['blog.layouts.sidebar-home'], function($view) {
            $recent_tags = Tag::orderBy('created_at', 'desc')->limit(12)->get();
            $view->with('recent_tags', $recent_tags);
        });

        view()->composer(['blog.layouts.banner'], function($view) {
            $heroimage = HeroImage::first();
            $view->with('heroimage', $heroimage);
        });
    }
    
}

// Пример подсчета категорий
// SELECT categories.title, posts.title, COUNT(posts.id) AS post_count 
// FROM categories
// LEFT JOIN posts ON categories.id = posts.category_id
// GROUP BY categories.title