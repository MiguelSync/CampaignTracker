<?php

namespace App\Http\Controllers;

use App\Actions\CampaignUser\CampaignUserRemoveMember;
use App\Models\CampaignUser;

class CampaignUserController extends Controller
{
    public function removeMember(CampaignUser $campaignUser, CampaignUserRemoveMember $action) {
        $action->handle($campaignUser);
    }
}
