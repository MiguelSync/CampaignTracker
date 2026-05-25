<?php

use App\Http\Controllers\web\GameController;
use Illuminate\Support\Facades\Route;

Route::prefix('/game')->name('game.')->group(function () {
    Route::get('/', [GameController::class, 'index'])->name('index');
    Route::get('/create', [GameController::class, 'create'])->name('create');
    Route::post('/store', [GameController::class, 'store'])->name('store');
    Route::get('/show/{id}', [GameController::class, 'show'])->name('show');
    Route::put('/update/{id}', [GameController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [GameController::class, 'destroy'])->name('destroy');
});