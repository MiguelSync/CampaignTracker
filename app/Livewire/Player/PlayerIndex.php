<?php

namespace App\Livewire\Player;

use App\Models\Player;
use Livewire\Component;

class PlayerIndex extends Component
{

    public $name;

    public function render()
    {
        $players = Player::where('name', 'like', "%{$this->name}")->get();

        return view('livewire.player.player-index', [
            'players' => $players
        ]);
    }
}
