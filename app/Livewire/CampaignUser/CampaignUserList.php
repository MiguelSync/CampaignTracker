<?php

namespace App\Livewire\CampaignUser;

use App\Models\Campaign;
use App\Models\CampaignUser;
use Livewire\Component;
use Livewire\WithPagination;

class CampaignUserList extends Component
{

    use WithPagination;

    public Campaign $campaign;
    public $user_name;
    public $status;
    public $role;

    public array $campaignUserStatus = [];
    public array $campaignUserRole = [];
    public bool $isCampaignOwner;

    public function mount(Campaign $campaign, 
                          array $campaignUserStatus = [],
                          array $campaignUserRole = [],
                          bool $isCampaignOwner) 
    {
        $this->campaign = $campaign;
        $this->campaignUserStatus = $campaignUserStatus;
        $this->campaignUserRole = $campaignUserRole;
        $this->isCampaignOwner = $isCampaignOwner;
    }

    public function updatingUserName()
    {
        $this->resetPage();
    }

    public function updatingStatus() {
        $this->resetPage();
    }

    public function updatingRole() {
        $this->resetPage();
    }

    public function render()
    {
        $campaignUsers = CampaignUser::where('campaign_id', $this->campaign->id)
                        ->when($this->user_name, function ($query) {
                            $query->whereHas('user', function ($subQuery) {
                                $subQuery->where('name', 'ilike', "%{$this->user_name}%");
                            });
                        })
                        ->when($this->status, function ($query) {
                            $query->where('status', '=', "$this->status");
                        })
                        ->when($this->role, function ($query) {
                            $query->where('role', '=', "$this->role");
                        })
                        ->with('user')->paginate(10);

        return view('livewire.campaign_user.campaign_user-list', [
            'campaignusers' => $campaignUsers
        ]);
    }
}
