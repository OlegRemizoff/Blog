<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Blog\BlogPostController;

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

Route::get('/', [BlogPostController::class, 'index'])->name('home');
Route::get('/article/{slug}', [BlogPostController::class, 'show'])->name('posts.single');


Route::middleware('admin')->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [MainController::class, 'index'])->name('index');
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


