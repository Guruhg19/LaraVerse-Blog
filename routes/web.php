<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Member\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Blog routes

    Route::resource('/member/blogs',BlogController::class)->names([
        'index' => 'member.blogs.index', 
        'edit' => 'member.blogs.edit',
        'update' => 'member.blogs.update',
    ])->parameters([
        'blogs' => 'post'
    ]);
});

require __DIR__.'/auth.php';
