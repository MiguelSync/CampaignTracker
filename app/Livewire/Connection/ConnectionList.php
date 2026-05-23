<?php

namespace App\Livewire\Connection;

use App\Models\Connection;
use Livewire\Component;

class ConnectionList extends Component
{

    public $title;

    public function render()
    {
        $connections = Connection::where('title', 'ilike', "%$this->title%")->paginate(10);

        return view('livewire.connection.connection_list', [
            'connections' => $connections
        ]);
    }
}
