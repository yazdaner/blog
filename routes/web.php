<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Home\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Home\CommentController as HomeCommentController;
use App\Http\Controllers\Home\LandingController;
use App\Http\Controllers\Home\LikePostController;

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


Route::prefix('admin-panel/management')->name('admin.')
->middleware(['auth','verified'])
->group(function () {

    Route::get('/',[AdminDashboardController::class,'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::post('/editor/upload',[PostController::class,'postImagesUpload'])->name('editor-upload');
    Route::get('/comments',[CommentController::class,'index'])->name('comments.index');
    Route::delete('/comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');
    Route::put('/comments/{comment}',[CommentController::class,'update'])->name('comments.update');

});


Route::prefix('dashboard')->name('dashboard')
->middleware(['auth','verified'])
->group(function () {

    Route::get('/', [DashboardController::class, 'profileShow']);
    Route::put('/update/{user}', [DashboardController::class, 'profileUpdate'])->name('.update');
    Route::get('/posts-liked', [DashboardController::class, 'postsLikedShow'])->name('.posts-liked');
    Route::get('/comments', [DashboardController::class, 'commentsShow'])->name('.comments');
    Route::get('/bookmarks', [DashboardController::class, 'bookmarksShow'])->name('.bookmarks');

});


Route::get('/',[LandingController::class,'index'])->name('home');

Route::get('/category/{category:slug}',[LandingController::class,'CategoryPostShow'])->name('category.show');

Route::get('/search',[LandingController::class,'search'])->name('search');

Route::get('/contact-us',[LandingController::class,'contactUsShow'])->name('contact-us');

Route::get('/post/{post}',[LandingController::class,'postShow'])->name('post.show');

Route::middleware(['auth','verified'])->post('/comment',[HomeCommentController::class,'store'])->name('comment.store');

Route::middleware(['auth','throttle:like'])->post('/like/{post:slug}',[LikePostController::class,'store'])->name('like.store');

Route::middleware(['auth','throttle:like'])->post('/bookmark/{post:slug}',[LikePostController::class,'bookMarkStore'])->name('bookmark.store');













require __DIR__.'/auth.php';
