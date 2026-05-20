<?php

namespace App\Actions\Campaign;

use Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class CampaignStoreAction
{
    use AsAction;

    public function handle($input)
    {
        return Auth::user()->campaigns()->create($input);
    }
}
