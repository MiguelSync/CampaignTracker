<?php

namespace App\Actions\CampaignUser;

use App\Models\Campaign;
use App\Models\CampaignUser;
use Exception;
use Lorisleiva\Actions\Concerns\AsAction;

class CampaignUserStoreAction
{
    use AsAction;

    public function handle($input, Campaign $campaign)
    {
        $this->validateCampaignUserAlredyExists($input['user_id'], $campaign);
        $campaign->campaignUsers()->create($input);
    }

    /**
     * Validate if the user is alredy associated with the campaign
     * @throws Exception
     */
    public function validateCampaignUserAlredyExists(string $user_id, Campaign $campaign) {
        $bCampaignUserAlredyExists = CampaignUser::where('user_id', '=', $user_id)->where('campaign_id', '=', $campaign->id)->exists();

        if ($bCampaignUserAlredyExists) {
            throw new Exception('This user is alredy associated with the campaign!');
        }
    }
}
