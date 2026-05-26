<?php

namespace App\Actions\Connection;

use App\Models\Connection;
use Lorisleiva\Actions\Concerns\AsAction;

class ConnectionStoreAction
{
    use AsAction;

    public function handle(array $input)
    {
        return Connection::create($input);
    }
}
