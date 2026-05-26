<?php

namespace App\Actions\UserConnection;

use App\Models\UserConnection;
use Lorisleiva\Actions\Concerns\AsAction;

class UserConnectionStoreAction
{
    use AsAction;

    public function handle(array $input)
    {
        return auth()->user()->connections()->create($input);
    }
}
