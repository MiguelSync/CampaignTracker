<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('/user')->name('user.')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/{user}', [UserController::class, 'show'])->name('show');
    Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
});