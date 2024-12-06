<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagBlogController extends Controller
{
    public function index($slug) {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->get();
        
        return view('blog.posts.tag', compact('posts'));
    }
}


// Пример получения тегов для поста 
// SELECT tags.title
// FROM tags 
// JOIN post_tag ON tags.id = post_tag.tag_id
// WHERE posts.id = 1