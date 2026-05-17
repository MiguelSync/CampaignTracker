<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $playstyle;

    public array $userPlaystyleList;

    public function mount(array $userPlaystyleList) {
        $this->userPlaystyleList = $userPlaystyleList;
    }

    public function updateName() {
        $this->resetPage();
    }

    public function updateEmail() {
        $this->resetPage();
    }

    public function updatePlaystyle() {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'ilike', "%{$this->name}%")
                ->when($this->email, function($query) {
                    $query->where('email', 'ilike', "%$this->email%");
                })
                ->when($this->playstyle, function($query) {
                    $query->where('playstyle', '=', $this->playstyle);
                })
                ->paginate(10);

        return view('livewire.user.user-list', [
            'users' => $users
        ]);
    }
}
