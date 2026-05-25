<?php

use App\Http\Controllers\api\ConnectionController;
use Illuminate\Support\Facades\Route;

Route::prefix('/connection')->group(function () {
    Route::get('/', [ConnectionController::class, 'index']);
    Route::get('/create', [ConnectionController::class, 'create']);
    Route::post('/store', [ConnectionController::class, 'store']);
    Route::get('/show/{connection}', [ConnectionController::class, 'show']);
    Route::put('/update/{connection}', [ConnectionController::class, 'update']);
    Route::delete('/destroy/{connection}', [ConnectionController::class, 'destroy']);
});