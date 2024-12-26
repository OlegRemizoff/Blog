<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;

class BlogController extends Controller
{
    public function index()
    {   
        $posts = Post::with('category', 'comments.children')->paginate(5);
        foreach ($posts as $post) {
            $post->total_comments = $post->comments->reduce(function ($carry, $comment) {
                return $carry + 1 + $comment->children->count();
            }, 0);
        }
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
