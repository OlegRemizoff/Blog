<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        return view('blog.posts.index');
    }

    public function show($id) 
    {
        return view('blog.posts.single');
    }

}
