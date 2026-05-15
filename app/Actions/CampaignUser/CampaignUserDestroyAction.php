<?php

namespace App\Actions\CampaignUser;

use App\Models\CampaignUser;
use Lorisleiva\Actions\Concerns\AsAction;

class CampaignUserDestroyAction
{
    use AsAction;

    public function handle(CampaignUser $campaignUser)
    {
        $campaignUser->delete();
    }
}
