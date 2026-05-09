<?php

namespace App\Actions\Campaign;

use App\Models\Campaign;
use Lorisleiva\Actions\Concerns\AsAction;

class CampaignStoreAction
{
    use AsAction;

    public function handle($input)
    {
        Campaign::create($input);
    }
}
