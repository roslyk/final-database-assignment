<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('overview',['posts'=> Post::latest('created_at')->get()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post_view',['post'=> $post]);
});

Route::get('/users/{user:username}', function (User $user) {
    return view('overview_user',['posts'=> $user->posts]);
});

Route::get('/likePost/{post:id}', [LikeController::class,'giveLike'] );

Route::post('/postComment/{post:id}', [CommentController::class,'createComment'] );

Route::post('/createPost/', [PostController::class,'createPost'] );




