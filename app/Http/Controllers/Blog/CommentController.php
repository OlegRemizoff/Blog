<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request) {
            
        $request->validate([
            'note' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
            'post_id' => 'required|integer|exists:posts,id',
        ]);
        
        Comment::create([
            'content' => $request->input('note'),
            'user_id' => $request->input('user_id'),
            'post_id' => $request->input('post_id'),
        ]);

        return redirect()->back()->with('success', 'Комментарий добавлен');
    }

    public function update(Request $request, Comment $comment) {
        $request->validate([
            'content' => 'required|string|max:1000',

        ]);

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', 'Комментарий обновлен');

    }

}