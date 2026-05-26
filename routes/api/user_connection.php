<?php

use App\Http\Controllers\api\UserConnectionController;
use Illuminate\Support\Facades\Route;

Route::prefix('/user_connection')->name('user_connection_api.')->group(function () {
    Route::get('/{user}', [UserConnectionController::class, 'index'])->name('index');
    Route::post('/store', [UserConnectionController::class, 'store'])->name('store');
    Route::put('/update/{userConnection}', [UserConnectionController::class, 'update'])->name('update');
    Route::delete('/destroy/{userConnection}', [UserConnectionController::class, 'destroy'])->name('destroy');
});