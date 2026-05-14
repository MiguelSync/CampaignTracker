<?php

namespace App\Actions\CampaignUser;

use App\Models\CampaignUser;
use Lorisleiva\Actions\Concerns\AsAction;

class CampaignUserDestroy
{
    use AsAction;

    public function handle(CampaignUser $campaignUser)
    {
        $campaignUser->delete();
    }
}
