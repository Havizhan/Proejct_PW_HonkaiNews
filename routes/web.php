<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;

// Authentication routes
Auth::routes();

// Homepage - redirect to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Admin News routes (protected by auth middleware)
Route::middleware(['auth'])->group(function() {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});

// Public News routes
Route::get('/news', [NewsController::class, 'index'])->name('news.index'); // Tampilkan daftar berita
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show'); // Tampilkan detail berita

// Admin Dashboard
Route::get('/dashboard', function() {
    // Redirect non-admin user
    if (!Auth::user() || !Auth::user()->is_admin) {
        return redirect()->route('news.index')->with('error', 'Anda tidak memiliki hak akses ke halaman tersebut.');
    }
    
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile routes
Route::middleware(['auth'])->group(function() {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [App\Http\Controllers\ProfileController::class, 'editPassword'])->name('profile.password');
    Route::put('/profile/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.password.update');
});
