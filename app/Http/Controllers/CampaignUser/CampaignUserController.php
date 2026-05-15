<?php

namespace App\Http\Controllers\CampaignUser;

use App\Actions\CampaignUser\CampaignUserDestroyAction;
use App\Actions\CampaignUser\CampaignUserStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignUser\CampaignUserStoreRequest;
use App\Models\Campaign;
use App\Models\CampaignUser;

class CampaignUserController extends Controller
{

    public function store(CampaignUserStoreRequest $request, Campaign $campaign) {
        $input = $request->validated();
        CampaignUserStoreAction::run($input, $campaign);
        return redirect()->route('campaign.show', [
            'campaign' => $campaign
        ]);
    }

    public function destroy(CampaignUser $campaignUser) {
        CampaignUserDestroyAction::run($campaignUser);
    }
}
