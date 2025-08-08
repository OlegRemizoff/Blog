<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
<<<<<<< HEAD
=======
use App\Http\Resources\V1\PostResource;
>>>>>>> api_v1
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        //
=======
        // return Post::all();
        return PostResource::collection(Post::with('category', 'tags')->paginate(5));
>>>>>>> api_v1
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
<<<<<<< HEAD
        //
=======
        // Post::create($request->all());
        return new PostResource(Post::create($request->all()));

>>>>>>> api_v1
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
<<<<<<< HEAD
        //
=======
        
        // return response()->json([
        //     "id" => $post->id,
        //     "title" => $post->title,
        //     "content" => $post->content,
        //     "created_at" => $post->created_at
        // ]);
        return new PostResource($post);
>>>>>>> api_v1
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
<<<<<<< HEAD
        //
=======
        $post->update($request->all());
>>>>>>> api_v1
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
<<<<<<< HEAD
        //
=======
        $post->delete();
        return response()->json([
            "message" => "Post removed"
        ], 204);
>>>>>>> api_v1
    }
}
