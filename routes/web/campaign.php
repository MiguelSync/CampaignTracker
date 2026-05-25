<?php

use App\Http\Controllers\web\CampaignController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->name('campaign.')->group(function() {
    Route::get('/', [CampaignController::class, 'index'])->name('index');

    Route::prefix('/campaign')->group(function() {
        Route::get('/create', [CampaignController::class, 'create'])->name('create');
        Route::post('/store', [CampaignController::class, 'store'])->name('store');
        Route::put('/update/{campaign}', [CampaignController::class, 'update'])->name('update');
        Route::get('/{campaign}', [CampaignController::class, 'show'])->name('show');
        Route::delete('/destroy/{campaign}', [CampaignController::class, 'destroy'])->name('destroy');
    });
});