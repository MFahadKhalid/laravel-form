<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Nav\NavController;

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
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('blog/{id}/details', [IndexController::class, 'details'])->name('web.pages.details');

//category

Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create' , [CategoryController::class , 'create'])->name('category.create');
Route::post('category/store' , [CategoryController::class , 'store'])->name('category.store');
Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('category/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');

//Reader

Route::get('reader' , [ReaderController::class , 'index'])->name('reader.index');

//Left Nav

//Author

Route::get('authors' , [AuthorController::class , 'author'])->name('authors.index');


//Author Edit
Route::get('author/profile', [AuthorController::class,'profile'])->name('profile.edit');
Route::post('author/profile-update', [AuthorController::class,'update'])->name('profile.update');


//Blog

Route::get('blog' , [BlogController::class , 'index'])->name('blog.index');
Route::get('blog/create' , [BlogController::class , 'create'])->name('blog.create');
Route::post('blog/store' , [BlogController::class , 'store'])->name('blog.store');
Route::get('blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('blog/{id}/update', [BlogController::class, 'update'])->name('blog.update');
Route::get('blog/{id}/delete', [BlogController::class, 'delete'])->name('blog.delete');

//Nav
Route::get('nav' , [NavController::class , 'nav'])->name('include.author_left_nav');