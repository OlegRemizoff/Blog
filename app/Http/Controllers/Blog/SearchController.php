<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request) {
        $request->validate(
            [
                's' => 'required'
            ], 
            [
                's.required' => 'Поле поиска не должно быть пустым.'
            ]);

        $s = $request->s;
        $posts = Post::where('title', 'LIKE', "%{$s}%")->withCount('comments')->with('category')->paginate(5);
        return view('blog.posts.search', compact('posts', 's'));
    }
}
