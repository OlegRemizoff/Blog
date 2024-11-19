<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);





});