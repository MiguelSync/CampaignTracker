<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $name;

    public function render()
    {
        $users = User::where('name', 'ilike', "%{$this->name}%")->paginate(10);

        return view('livewire.user.user-list', [
            'users' => $users
        ]);
    }
}
