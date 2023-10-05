<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::get('posts', [PostController::class, 'getPosts'])->name('get.posts');
    Route::post('post/create', [PostController::class, 'createPost'])->name('create.post');
    Route::put('post/update', [PostController::class, 'updatePost'])->name('update.post');
    Route::delete('post/delete', [PostController::class, 'destroyPost'])->name('delete.post');
