<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (!\Illuminate\Support\Facades\Auth::check()) {
        return redirect(route('admin'));
    } else {
        return redirect(route('myBooks'));
    }
});

//Authentication Route
Route::get('admin', [AuthController::class, 'index'])->name('admin')->withoutMiddleware([AuthMiddleware::class]);
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->withoutMiddleware([AuthMiddleware::class]);
Route::post('login', [AuthController::class, 'login'])->name('login')->withoutMiddleware([AuthMiddleware::class]);

Route::get('register', [UserController::class, 'index'])->name('registerPage')->withoutMiddleware([AuthMiddleware::class]);
Route::post('register', [UserController::class, 'register'])->name('register')->withoutMiddleware([AuthMiddleware::class]);

Route::middleware([AuthMiddleware::class])->group(function () {
    //Post Controlling Route
    Route::post('addPosts', [PostController::class, 'addPosts'])->name('addPosts');

    Route::post('editBooks', [PostController::class, 'editBooks'])->name('editBooksRequest');
    Route::get('editBooks/{book}', [MainPageController::class, 'editBooks'])->name('editBooks');
    Route::post('editBlogs', [PostController::class, 'editBlogs'])->name('editBlogsRequest');
    Route::get('editBlogs/{blog}', [MainPageController::class, 'editBlogs'])->name('editBlogs');

    Route::get('deleteBlogs/{blog}', [PostController::class, 'deleteBlogs'])->name('deleteBlogsRequest');
    Route::get('deleteBooks/{book}', [PostController::class, 'deleteBooks'])->name('deleteBooksRequest');

    //Post Viewing Route
    Route::get('homepage', [MainPageController::class, 'homePage'])->name('myBooks');
    Route::get('viewPosts/{category}/{id}', [MainPageController::class, 'viewPosts'])->name('viewPosts');


    Route::get('searchResults', [MainPageController::class, 'searchPosts'])->name('searchPosts');
    Route::get('searchResultsView', [MainPageController::class, 'searchPostsView'])->name('searchPostsView');
});
