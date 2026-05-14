<?php

use App\Http\Controllers\CampaignUserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('campaignuser')->name('campaignuser.')->group(function() {
    Route::get('/campaign_user/create', [CampaignUserController::class, 'create'])->name('create');
    Route::post('/campaign_user/store', [CampaignUserController::class, 'store'])->name('store');
    Route::delete('/campaign_user/destroy/{campaignuser}', [CampaignUserController::class, 'destroy'])->name('destroy');
});