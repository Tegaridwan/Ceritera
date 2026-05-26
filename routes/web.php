<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::middleware('auth')->group(function () {

    /*
    | POSTS
    */

    Route::resource('posts', PostController::class);

    /*
    | READ STORY
    */

    Route::get('/posts/{post}/read/{chapter?}', [PostController::class, 'read'])
        ->name('posts.read');

    /*
    | MY STORIES
    */

    Route::get('/ceritamu', [PostController::class, 'myPosts'])
        ->name('posts.ceritamu');

    /*
    | CHAPTERS
    */

    Route::resource('posts.chapters', ChapterController::class)
        ->middleware('auth');

    /*
    | DASHBOARD
    */

    Route::get('/dashboard', [PostController::class, 'index'])
        ->name('dashboard');

    /*
    | AUTHOR
    */

    Route::get('/author/{user}', [PostController::class, 'author'])
        ->name('author.profile');

    /*
    | ADMIN
    */

    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('/admin', [AdminController::class, 'index'])
            ->name('admin.index');

        Route::get('/admin/posts/{id}/read', [AdminController::class, 'read'])
            ->name('admin.posts.read');
    });

    /*
    | PROFILE
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
})->middleware('auth');

/*
| ADMIN
*/

// Route::get('/admin', [AdminController::class, 'index'])
//     ->name('admin.index')
//     ->middleware('admin');

require __DIR__ . '/auth.php';
