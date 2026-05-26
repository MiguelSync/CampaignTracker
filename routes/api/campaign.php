<?php

use App\Http\Controllers\api\CampaignController;
use Illuminate\Support\Facades\Route;

Route::prefix('/campaign')->name('campaign_api.')->group(function() {
    Route::get('/', [CampaignController::class, 'index'])->name('index');
    Route::post('/store/{user}', [CampaignController::class, 'store'])->name('store');
    Route::put('/update/{campaign}', [CampaignController::class, 'update'])->name('update');
    Route::get('/{campaign}', [CampaignController::class, 'show'])->name('show');
    Route::delete('/destroy/{campaign}', [CampaignController::class, 'destroy'])->name('destroy');
});