<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\V1\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Post::all();
        return PostResource::collection(Post::with('category', 'tags')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Post::create($request->all());
        return new PostResource(Post::create($request->all()));

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
        // return response()->json([
        //     "id" => $post->id,
        //     "title" => $post->title,
        //     "content" => $post->content,
        //     "created_at" => $post->created_at
        // ]);
        return new PostResource($post);
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
