<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [ArticleController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [ArticleController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard', [ArticleController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/{id}/edit', [ArticleController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{id}', [ArticleController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/{id}', [ArticleController::class, 'destroy'])->name('dashboard.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
