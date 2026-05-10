<?php

namespace App\Http\Controllers\User;

use App\Actions\User\UserDelete;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{

    public function index() {
        return view('user.index');
    }

    public function show(User $user) {
        return view('user.show', [
            'user' => $user
        ]);
    }

    public function delete(User $user, UserDelete $action) {
        $action->handle($user);
    }
}
