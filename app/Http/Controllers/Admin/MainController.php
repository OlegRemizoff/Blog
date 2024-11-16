<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Tag;

class MainController extends Controller
{

public function index() {


    $tag = new Tag();
    $tag->title = 'marvel';
    $tag->save();
    return view('admin.index');
}




}





