<?php

use App\Http\Controllers\api\CampaignUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('campaign_user')->name('campaign_user_api.')->group(function() {
    Route::get('/{campaign}', [CampaignUserController::class, 'index'])->name('index');
    Route::post('/store/{campaign}', [CampaignUserController::class, 'store'])->name('store');
    Route::delete('/destroy/{campaignUser}', [CampaignUserController::class, 'destroy'])->name('destroy');
});