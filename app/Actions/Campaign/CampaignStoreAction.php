<?php

namespace App\Actions\Campaign;

use App\Models\User;
use Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class CampaignStoreAction
{
    use AsAction;

    public function handle($input, User $user = null)
    {
        if (is_null($user)) {
            $user = Auth::user();
        }

        return $user->campaigns()->create($input);
    }
}
