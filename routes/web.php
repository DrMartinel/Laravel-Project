<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (!auth()->check()) {
        return redirect(route('admin'));
    } else {
        return redirect(route('myBooks'));
    }
});

//Authentication Route
Route::get('admin',[AuthController::class,'index'])->name('admin');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::post('login',[AuthController::class,'login'])->name('login');

Route::get('register',[UserController::class,'index'])->name('registerPage');
Route::post('register',[UserController::class,'register'])->name('register');

//Post Controlling Route
Route::get('newPosts',[MainPageController::class,'newPosts'])->name('newPosts');
Route::post('addPosts',[PostController::class,'addPosts'])->name('addPosts');

Route::post('editBooks',[PostController::class,'editBooks'])->name('editBooksRequest');
Route::get('editBooks/{book}', [MainPageController::class, 'editBooks'])->name('editBooks');
Route::post('editBlogs',[PostController::class,'editBlogs'])->name('editBlogsRequest');
Route::get('editBlogs/{blog}', [MainPageController::class, 'editBlogs'])->name('editBlogs');

Route::get('deleteBlogs/{blog}',[PostController::class,'deleteBlogs'])->name('deleteBlogsRequest');
Route::get('deleteBooks/{book}',[PostController::class,'deleteBooks'])->name('deleteBooksRequest');

//Post Viewing Route
Route::get('myBlogs',[MainPageController::class,'myBlogs'])->name('myBlogs');
Route::get('myBooks',[MainPageController::class,'myBooks'])->name('myBooks');
Route::get('allBlogs',[MainPageController::class,'allBlogs'])->name('allBlogs');
Route::get('allBooks',[MainPageController::class,'allBooks'])->name('allBooks');
Route::get('viewPosts/{category}/{id}',[MainPageController::class,'viewPosts'])->name('viewPosts');


Route::post('searchResults',[MainPageController::class,'searchPosts'])->name('searchPosts');


