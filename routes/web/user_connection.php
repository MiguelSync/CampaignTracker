<?php

use App\Http\Controllers\web\UserConnectionController;
use Illuminate\Support\Facades\Route;

Route::prefix('/user_connection')->name('user_connection.')->group(function () {
    Route::post('/store', [UserConnectionController::class, 'store'])->name('store');
    Route::put('/update/{userConnection}', [UserConnectionController::class, 'update'])->name('update');
    Route::delete('/destroy/{userConnection}', [UserConnectionController::class, 'destroy'])->name('destroy');
});