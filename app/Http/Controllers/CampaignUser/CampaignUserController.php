<?php

namespace App\Http\Controllers\CampaignUser;

use App\Actions\CampaignUser\CampaignUserDestroyAction;
use App\Actions\CampaignUser\CampaignUserStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignUser\CampaignUserStoreRequest;
use App\Models\Campaign;
use App\Models\CampaignUser;
use Exception;
use Throwable;

class CampaignUserController extends Controller
{

    public function store(CampaignUserStoreRequest $request, Campaign $campaign) {
        try {
            $input = $request->validated();
            CampaignUserStoreAction::run($input, $campaign);
            return redirect()->route('campaign.show', [
                'campaign' => $campaign
            ]);
        } catch (Throwable $ex) {
            return $this->handleExceptionBackWithErrors($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionBackWithErrors($ex);
        }
    }

    public function destroy(CampaignUser $campaignUser) {
        CampaignUserDestroyAction::run($campaignUser);
        return redirect()->back();
    }
}
