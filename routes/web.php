<?php

use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;

Route::controller(CampaignController::class)->prefix('campaigns')->name('campaigns.')->group(function() {
    Route::get('/', 'index')->name('index');
});