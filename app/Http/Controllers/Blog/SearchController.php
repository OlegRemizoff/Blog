<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{


    public function index(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ], [
            'search.required' => 'Поле поиска не должно быть пустым.'
        ]);

        $search = trim($request->input('search'));
        $data = Post::where('title', 'LIKE', "%{$search}%")
            ->withCount('comments')
            ->with('category')
            ->get()
            ->map(function ($post) {
                return [
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'description' => strip_tags($post->description),
                    'image' => $post->getImage(),
                    'post_date' => $post->getPostDate(),
                    'views' => $post->views,
                    'category_title' => $post->category->title ?? 'Без категории',
                    'category_slug' => $post->category->slug ?? '',
                    'total_comments' => $post->comments->reduce(function ($carry, $comment) {
                        return $carry + 1 + $comment->children->count();
                    }, 0)
                ];
            });

        return response()->json($data);
    }
    
// public function index(Request $request) {
    //     $request->validate(
    //         [
    //             's' => 'required'
    //         ], 
    //         [
    //             's.required' => 'Поле поиска не должно быть пустым.'
    //         ]);

    //     $s = $request->s;
    //     $posts = Post::where('title', 'LIKE', "%{$s}%")->withCount('comments')->with('category')->paginate(5);
    //     return view('blog.posts.search', compact('posts', 's'));
    // }
}
