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
        return redirect(route('mainpage'));
    }

});

//Route::get('/', function () {
//    return view ('welcome');
//});

Route::get('admin',[AuthController::class,'index'])->name('admin');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::get('homepage',[MainPageController::class,'index'])->name('mainpage');
Route::get('newPosts',[MainPageController::class,'newPosts'])->name('newPosts');
Route::get('register',[UserController::class,'index'])->name('registerPage');
// In routes/web.php
Route::get('editBooks/{book}', [MainPageController::class, 'editBooks'])->name('editBooks');

// In routes/web.php
Route::get('editBlogs/{blog}', [MainPageController::class, 'editBlogs'])->name('editBlogs');


Route::post('addPosts',[PostController::class,'addPosts'])->name('addPosts');
Route::post('editBooks',[PostController::class,'editBooks'])->name('editBooksRequest');
Route::post('editBlogs',[PostController::class,'editBlogs'])->name('editBlogsRequest');
Route::get('deleteBlogs/{blog}',[PostController::class,'deleteBlogs'])->name('deleteBlogsRequest');
Route::get('deleteBooks/{book}',[PostController::class,'deleteBooks'])->name('deleteBooksRequest');

Route::get('allPosts',[MainPageController::class,'allPosts'])->name('allPosts');

Route::post('searchResults',[MainPageController::class,'searchPosts'])->name('searchPosts');

Route::post('login',[AuthController::class,'login'])->name('login');
Route::post('register',[UserController::class,'register'])->name('register');
