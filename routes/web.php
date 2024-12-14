<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HeroImageController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;

use App\Http\Controllers\Blog\SearchController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\TagBlogController;
use App\Http\Controllers\Blog\CategoryBlogController;
use App\Http\Controllers\Blog\CommentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great
*/
// php artisan route:list --path=admin | просмотреть все маршруты

Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/article/{slug}', [BlogController::class, 'show'])->name('posts.single');
Route::get('/category/{slug}', [CategoryBlogController::class, 'index'])->name('posts.by.category');
Route::get('/tag/{slug}', [TagBlogController::class, 'index'])->name('posts.by.tag');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::post('/comment', [CommentController::class, 'store'])->name('comment');
Route::put('/comment/{comment}', [CommentController::class, 'update'])->name('comment.update');



Route::middleware('admin')->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/heroimage', [HeroImageController::class, 'index'])->name('hero.image');
    Route::post('/heroimage', [HeroImageController::class, 'store'])->name('hero.image.store');
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('posts', PostController::class);
});



Route::middleware('guest')->group(function() {
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'loginform'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});


Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');


