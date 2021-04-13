<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Models\PostModel;
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

Route::middleware('auth:sanctum')->get('/authentication', function () {
    return true;
});

Route::middleware('auth:sanctum')->get('/posts', function(){
    $posts = new PostModel();
    return $posts->all()->reverse();
});

Route::middleware('auth:sanctum')->get('/post/{id}', function($id){
    $post = PostModel::find($id);
    return $post;
});

Route::post('addpost', [PostController::class, 'post_add']);

Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout']);

