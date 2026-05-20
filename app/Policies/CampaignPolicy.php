<?php

namespace App\Policies;

use App\Models\Campaign;
use App\Models\User;
use Auth;

class CampaignPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function isCampaignOwner(User $user, Campaign $campaign) {
        return $user->id == $campaign->user_id;
    }
}
