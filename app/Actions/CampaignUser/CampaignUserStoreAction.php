<?php

namespace App\Actions\CampaignUser;

use App\Models\Campaign;
use Lorisleiva\Actions\Concerns\AsAction;

class CampaignUserStoreAction
{
    use AsAction;

    public function handle($input, Campaign $campaign)
    {
        $campaign->campaignUsers()->create($input);
    }
}
