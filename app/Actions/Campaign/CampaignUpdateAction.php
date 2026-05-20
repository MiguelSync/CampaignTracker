<?php

namespace App\Actions\Campaign;

use App\Models\Campaign;
use Lorisleiva\Actions\Concerns\AsAction;

class CampaignUpdateAction
{
    use AsAction;

    public function handle(array $input, Campaign $campaign)
    {
        $campaign->update($input);
    }
}
