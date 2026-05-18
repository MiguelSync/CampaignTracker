<?php

use App\Http\Controllers\CampaignUser\CampaignUserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('campaign_user')->name('campaignuser.')->group(function() {
    Route::get('/create', [CampaignUserController::class, 'create'])->name('create');
    Route::post('/store/{campaign}', [CampaignUserController::class, 'store'])->name('store');
    Route::delete('/destroy/{campaignUser}', [CampaignUserController::class, 'destroy'])->name('destroy');
});