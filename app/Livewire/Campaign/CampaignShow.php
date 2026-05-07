<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use Livewire\Component;

class CampaignShow extends Component
{
    public function render()
    {
        $Campaigns = Campaign::all();
        return view('livewire.campaign.campaign-show', [
            'campaign' => $Campaigns,
            'title' => 'Campanhas Detalhadas'
        ]);
    }
}
