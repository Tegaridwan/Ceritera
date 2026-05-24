<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChapterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | POSTS
    |--------------------------------------------------------------------------
    */

    Route::resource('posts', PostController::class);

    /*
    |--------------------------------------------------------------------------
    | READ STORY
    |--------------------------------------------------------------------------
    */

    Route::get('/posts/{post}/read', [PostController::class, 'read'])
        ->name('posts.read');

    /*
    |--------------------------------------------------------------------------
    | MY STORIES
    |--------------------------------------------------------------------------
    */

    Route::get('/ceritamu', [PostController::class, 'myPosts'])
        ->name('posts.ceritamu');

    /*
    |--------------------------------------------------------------------------
    | CHAPTERS
    |--------------------------------------------------------------------------
    */

    Route::resource('posts.chapters', ChapterController::class);

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [PostController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {

    return view('admin.index');

})->middleware('auth');

require __DIR__.'/auth.php';