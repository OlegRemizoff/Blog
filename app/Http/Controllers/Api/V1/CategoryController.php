<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
<<<<<<< HEAD
=======
use App\Http\Resources\V1\CategoryResource;
>>>>>>> api_v1
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        return Category::all();
=======
        // return Category::all();
        return CategoryResource::collection(Category::all());
        
>>>>>>> api_v1
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
<<<<<<< HEAD
        Category::create($request->all());
=======
        return new CategoryResource(Category::create($request->all()));
>>>>>>> api_v1
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
<<<<<<< HEAD
=======
        return new CategoryResource($category);
>>>>>>> api_v1
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
<<<<<<< HEAD
        return response()->json([
            "message" => "Category removed"
        ]);
=======
        return response()->json(
            ["message" => "category has been deleted"]
        );
>>>>>>> api_v1
    }
}
