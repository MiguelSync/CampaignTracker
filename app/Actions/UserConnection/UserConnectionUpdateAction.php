<?php

namespace App\Actions\UserConnection;

use App\Models\UserConnection;
use Lorisleiva\Actions\Concerns\AsAction;

class UserConnectionUpdateAction
{
    use AsAction;

    public function handle(array $input, UserConnection $userConnection)
    {
        $userConnection->update($input);
    }
}
