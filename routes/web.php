<?php

use App\Http\Controllers\FruitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/fruit', [FruitController::class, 'index'])->name('fruit');
    Route::post('/fruit', [FruitController::class, 'store'])->name('fruit.store');
    Route::get('/fruit/edit/{fruit}', [FruitController::class, 'edit'])->name('fruit.edit');
    Route::put('/fruit/update/{fruit}', [FruitController::class, 'update'])->name('fruit.update');
    Route::delete('/fruit/delete/{fruit}', [FruitController::class, 'destroy'])->name('fruit.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
