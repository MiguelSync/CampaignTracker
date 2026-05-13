<?php

namespace App\Actions\Campaign;

use App\Models\Campaign;
use Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class CampaignStoreAction
{
    use AsAction;

    public function handle($input)
    {
        Auth::user()->campaigns()->create($input);
    }
}
