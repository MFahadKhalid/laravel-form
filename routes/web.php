<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;

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

//category

Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create' , [CategoryController::class , 'create'])->name('category.create');
Route::post('category/store' , [CategoryController::class , 'store'])->name('category.store');
Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('category/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');

//Reader

Route::get('reader' , [ReaderController::class , 'index'])->name('reader.index');

//Author

Route::get('author' , [AuthorController::class , 'index'])->name('authors.index');

//Blog

Route::get('create', [BlogController::class , 'create'])->name('blog.create');
Route::post('store', [BlogController::class , 'store'])->name('blog.store');