<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('Post.index');

Route::get('Post/{post}', [PostController::class, 'show'])->name('Post.show');

Route::get('Category/{category}', [PostController::class, 'category'])->name('Post.category');

Route::get('Tag/{tag}', [PostController::class, 'tag'])->name('Post.tag');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
});

Route::get('Prueba', function() {
    return view('prueba');
});
