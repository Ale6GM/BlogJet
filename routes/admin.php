<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

// para proteger estas rutas de tipo resource con el middleware lo vamos a tener que hacer desde el controlador para proteger cada uno de los metodos -- ir al controlador.
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users')->parameters(['User' => 'user']);
Route::resource('roles' , RoleController::class)->parameters(['Role'=> 'role'])->names('admin.roles');


Route::resource('categories', CategoryController::class)->names('admin.categories')->except('show')->parameters(['Categories'=> 'category']);
Route::resource('tags', TagController::class)->names('admin.tags')->except('show')->parameters(['Tag'=>'tag']);
Route::resource('posts', PostController::class)->names('admin.posts')->parameters(['Post' => 'post']);

