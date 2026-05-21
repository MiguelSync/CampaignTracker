<?php

use App\Http\Controllers\ConnectionController;
use Illuminate\Support\Facades\Route;

Route::prefix('/connection')->name('connection.')->group(function () {
    Route::get('/', [ConnectionController::class, 'index'])->name('index');
    Route::get('/create', [ConnectionController::class, 'create'])->name('create');
    Route::post('/store', [ConnectionController::class, 'store'])->name('store');
    Route::get('/show/{id}', [ConnectionController::class, 'show'])->name('show');
    Route::put('/update/{id}', [ConnectionController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [ConnectionController::class, 'destroy'])->name('destroy');
});