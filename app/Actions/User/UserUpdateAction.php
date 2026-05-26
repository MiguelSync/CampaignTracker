<?php

namespace App\Actions\User;

use App\Models\User;
use Exception;
use Lorisleiva\Actions\Concerns\AsAction;

class UserUpdateAction
{
    use AsAction;

    public function handle(array $input, User $user)
    {
        $user->update($input);
    }
}
