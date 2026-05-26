<?php

use App\Http\Controllers\api\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/user')->name('user_api.')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/{user}', [UserController::class, 'show'])->name('show');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
});