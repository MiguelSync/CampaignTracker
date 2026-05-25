<?php

use App\Http\Controllers\api\CampaignUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('campaign_user')->group(function() {
    Route::get('/create', [CampaignUserController::class, 'create']);
    Route::post('/store/{campaign}', [CampaignUserController::class, 'store']);
    Route::delete('/destroy/{campaignUser}', [CampaignUserController::class, 'destroy']);
});