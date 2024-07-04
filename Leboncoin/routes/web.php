<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdController;

Route::get('/', [IndexController::class, 'showIndex']);

Route::get('/dashboard', [AdController::class, 'annonces'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/ajout', [AdController::class, 'create'])->name('ad.create');

Route::post('/ajout/creer', [AdController::class, 'store'])->name('ad.store');

Route::get('/search', [AdController::class, 'search'])->name('ad.search');

Route::delete('/ads/{ad}', [AdController::class, 'destroy'])->name('ads.destroy');

Route::get('/ads/{ad}/edit', [AdController::class, 'edit'])->name('ads.edit');
Route::put('/ads/{ad}', [AdController::class, 'update'])->name('ads.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
