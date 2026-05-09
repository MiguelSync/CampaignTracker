<?php

namespace App\Actions\User;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class UserDelete
{
    use AsAction;

    public function handle(User $user)
    {
        $user->delete();
    }
}
