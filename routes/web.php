<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', [BookmarkController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);
    // Route::get('/bookmarks/{bookmark}', [BookmarkController::class, 'show'])->name('bookmarks.show')->whereNumber('id');
    // Route::post('/bookmarks/', [BookmarkController::class, 'store'])->name('bookmarks.store');

    Route::get('/dashboard', [BookmarkController::class, 'index'])->name('dashboard');
    Route::get('/bookmarks/create', [BookmarkController::class, 'create'])->name('bookmarks.create');
    Route::post('/bookmarks', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::get('/bookmarks/{bookmark}', [BookmarkController::class, 'show'])->name('bookmarks.show')->whereNumber('bookmark');
    Route::get('/bookmarks/{bookmark}/edit', [BookmarkController::class, 'edit'])->name('bookmarks.edit')->whereNumber('bookmark');
    Route::put('/bookmarks/{bookmark}', [BookmarkController::class, 'update'])->name('bookmarks.update')->whereNumber('bookmark');
    Route::delete('/bookmarks/{bookmark}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy')->whereNumber('bookmark');

    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show')->whereNumber('tag');
    Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit')->whereNumber('tag');
    Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update')->whereNumber('tag');
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy')->whereNumber('tag');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
