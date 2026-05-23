<?php

namespace App\Actions\Connection;

use App\Models\Connection;
use Lorisleiva\Actions\Concerns\AsAction;

class ConnectionDestroyAction
{
    use AsAction;

    public function handle(Connection $connection)
    {
        $connection->delete();
    }
}
