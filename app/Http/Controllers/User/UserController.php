<?php

namespace App\Http\Controllers\User;

use App\Actions\User\UserDelete;
use App\Enum\UserEnum;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{

    public function index() {
        return view('user.index', [
            'userPlaystyleList' => UserEnum::getListPlaystyle()
        ]);
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
