<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('categories', CategoryController::class)->names('admin.categories')->parameters(['Categories'=> 'category']);
Route::resource('tags', TagController::class)->names('admin.tags')->parameters(['Tag'=>'tag']);
