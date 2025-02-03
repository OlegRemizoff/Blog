<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminSearchController extends Controller
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
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'description' => strip_tags($post->description),
                    'image' => $post->getImage(),
                    'post_date' => $post->getPostDate(),
                    'views' => $post->views,
                    'category' => $post->category->title ?? 'Без категории',
                    'tags' => $post->tags->pluck('title')->join(', '),
                    'total_comments' => $post->comments->reduce(function ($carry, $comment) {
                        return $carry + 1 + $comment->children->count();
                    }, 0)
                ];
            });

        return response()->json($data);
    }
    

}
