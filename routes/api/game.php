<?php

use App\Http\Controllers\api\GameController;
use Illuminate\Support\Facades\Route;

Route::prefix('/game')->group(function () {
    Route::get('/', [GameController::class, 'index']);
    Route::post('/store', [GameController::class, 'store']);
    Route::get('/show/{id}', [GameController::class, 'show']);
    Route::put('/update/{id}', [GameController::class, 'update']);
    Route::delete('/destroy/{id}', [GameController::class, 'destroy']);
});