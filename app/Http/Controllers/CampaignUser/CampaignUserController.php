<?php

namespace App\Http\Controllers;

use App\Actions\CampaignUser\CampaignUserDestroy;
use App\Actions\CampaignUser\CampaignUserRemoveMember;
use App\Models\CampaignUser;

class CampaignUserController extends Controller
{

    public function create() {

    }

    public function store() {
        
    }

    public function destroy(CampaignUser $campaignUser) {
        CampaignUserDestroy::run($campaignUser);
    }
}
