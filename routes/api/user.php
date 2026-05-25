<?php

use App\Http\Controllers\api\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/user')->group(function() {
    Route::get('/', [UserController::class, 'index']);
    Route::delete('/destroy/{user}', [UserController::class, 'destroy']);
});