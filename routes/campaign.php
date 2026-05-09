<?php

use App\Livewire\Campaign\CampaignCreate;
use App\Livewire\Campaign\CampaignIndex;
use App\Livewire\Campaign\CampaignShow;
use Illuminate\Support\Facades\Route;

Route::get('/Campaign', CampaignIndex::class);

Route::prefix('/campaign')->name('campaign.')->group(function() {
    Route::get('/', CampaignIndex::class)->name('index');
    Route::get('/create', [CampaignCreate::class, 'create'])->name('create');
    Route::post('/show', [CampaignShow::class, 'show'])->name('show');
    Route::post('/store', [CampaignShow::class, 'store'])->name('store');
});