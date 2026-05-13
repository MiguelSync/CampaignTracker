<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use Livewire\Component;
use Livewire\WithPagination;

class CampaignList extends Component
{

    use WithPagination;

    public $title;

    public function render()
    {
        $campaigns = Campaign::where('title', 'ilike', "%$this->title%")->paginate(10);

        return view('livewire.campaign.campaign-list', [
            'campaigns' => $campaigns
        ]);
    }
}
