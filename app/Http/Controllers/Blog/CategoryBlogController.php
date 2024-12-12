<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;

class CategoryBlogController extends Controller
{
    public function index($slug) 
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->withCount('comments')->paginate(5);
        $tags = Tag::orderBy('created_at', 'desc')->limit(12)->get();
        return view('blog.posts.category', compact('posts', 'tags'));

    }
}
