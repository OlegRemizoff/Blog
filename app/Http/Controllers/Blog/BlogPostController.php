<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

class BlogPostController extends Controller
{
    public function index()
    {   
        $posts = Post::with('category')->paginate(2);
        return view('blog.posts.index', compact('posts'));
    }

    public function show($slug) 
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->views += 1;
        $post->update();
        return view('blog.posts.single', compact('post'));
    }

}
