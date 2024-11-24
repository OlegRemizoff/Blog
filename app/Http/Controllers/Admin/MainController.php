<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\Category;

class MainController extends Controller
{

public function index() {
    $post_count = Post::count('id');
    $category_count = Category::count('id');

    return view('admin.index', compact('post_count', 'category_count'));
}




}





