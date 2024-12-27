<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;


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
        $post = Post::with([
            'user',
            'comments.user',
            'comments.children.user',
        ])->where('slug', $slug)->firstOrFail();

        $post->parent = $post->comments->whereNull('parent_id');
        $post->children = $post->comments->flatMap(function ($parent) {
            return $parent->children;
        });
        
        // $post->setAttribute('parent', $post->comments->whereNull('parent_id')); // не участвуют в save или update
        // $parentsComments = Comment::where('post_id', $post->id)->whereNull('parent_id')->get();
        // $childrenComments = Comment::where('post_id', $post->id)->whereNotNull('parent_id')->get();

        $post->increment('views');
        return view('blog.posts.single', compact('post'));
    }

}
