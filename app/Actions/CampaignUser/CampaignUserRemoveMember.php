<?php

namespace App\Actions\CampaignUser;

use App\Models\CampaignUser;
use Lorisleiva\Actions\Concerns\AsAction;

class CampaignUserRemoveMember
{
    use AsAction;

    public function handle(CampaignUser $campaignUser)
    {
        $campaignUser->delete();
    }
}
