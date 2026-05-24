<?php

namespace App\Actions\UserConnection;

use App\Models\UserConnection;
use Lorisleiva\Actions\Concerns\AsAction;

class UserConnectionDestroyAction
{
    use AsAction;

    public function handle(UserConnection $userConnection)
    {
        $userConnection->delete();
    }
}
