<?php

namespace App\Actions\Campaign;

use App\Models\Campaign;
use Lorisleiva\Actions\Concerns\AsAction;

class CampaignDestroyAction
{
    use AsAction;

    public function handle(Campaign $campaign)
    {
        $campaign->delete();
    }
}
