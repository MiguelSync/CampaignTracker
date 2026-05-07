<?php

namespace App\Actions\Player;

use App\Models\Player;
use Lorisleiva\Actions\Concerns\AsAction;

class PlayerStoreAction
{
    use AsAction;

    public function handle($input)
    {
        Player::create($input);
    }
}
