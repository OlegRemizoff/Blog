<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        Post::create($request->all());
        return response()->json(
            ['message' => "Post has been created"], 200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
        return response()->json([
            "id" => $post->id,
            "title" => $post->title,
            "content" => $post->content,
            "created_at" => $post->created_at
        ]);
        // var_dump($post->title);
        // return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            "message" => "Post removed"
        ], 204);
    }
}
