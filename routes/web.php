<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapterController;

Route::resource('posts', PostController::class)->middleware('auth');
Route::resource('posts.chapters', ChapterController::class)->middleware('auth');

Route::get('/ceritamu', [PostController::class, 'myPosts'])->name('posts.ceritamu');

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');



Route::get('/dashboard', [PostController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('posts', PostController::class);
});

require __DIR__.'/auth.php';
