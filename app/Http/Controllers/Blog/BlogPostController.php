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
        $posts = Post::all();
        $post = Post::findBySlug($posts, $slug);
        dd($post);
        // dd($post);
        // $post = Post::find('1');
        // dd($post->slug);
        // return view('blog.posts.single');
    }

}
