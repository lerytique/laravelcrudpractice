<?php

use App\Http\Controllers\DisplayController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts-list', [DisplayController::class, 'showPostList'])->name('posts.index');
Route::get('/posts/{id}', [DisplayController::class, 'showPost'])->name('posts.show');
Route::get('/posts-create', [DisplayController::class, 'showPostCreateForm'])->name('post.create.form');
Route::get('/posts/{id}/edit', [DisplayController::class, 'showPostEditForm'])->name('post.edit.form');
