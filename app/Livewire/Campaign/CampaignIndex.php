<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use Livewire\Component;

class CampaignIndex extends Component
{
    public function render()
    {
        $Campaigns = Campaign::all();
        return view('livewire.campaign.index', [
            'campaign' => $Campaigns,
            'title' => 'Campanhas'
        ]);
    }
}
