<?php

use App\Http\Controllers\PlayerController;
use App\Livewire\Player\PlayerIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('/player')->name('player.')->group(function() {
    Route::get('/', PlayerIndex::class)->name('index');
    Route::get('/create', [PlayerController::class, 'create'])->name('create');
    Route::post('/store', [PlayerController::class, 'store'])->name('store');
    Route::get('/show', [PlayerController::class, 'show'])->name('show');
    Route::delete('/destroy', [PlayerController::class, 'destroy'])->name('destroy');
});