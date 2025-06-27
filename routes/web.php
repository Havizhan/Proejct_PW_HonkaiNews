<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;

// Authentication routes
Auth::routes();

// Homepage - redirect to news
Route::get('/', function () {
    return redirect()->route('news.index');
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
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
