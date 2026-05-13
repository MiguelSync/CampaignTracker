<?php

namespace App\Actions\Game;

use App\Models\Game;
use Lorisleiva\Actions\Concerns\AsAction;

class GameCreateAction
{
    use AsAction;

    public function handle($input)
    {
        Game::create($input);
    }
}
