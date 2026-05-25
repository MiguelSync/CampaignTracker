<?php

use App\Http\Controllers\web\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('/user')->name('user.')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
});