<?php

namespace App\Http\Controllers\web;

use App\Actions\UserConnection\UserConnectionDestroyAction;
use App\Actions\UserConnection\UserConnectionStoreAction;
use App\Actions\UserConnection\UserConnectionUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserConnection\UserConnectionStoreRequest;
use App\Http\Requests\UserConnection\UserConnectionUpdateRequest;
use App\Models\UserConnection;
use Illuminate\Http\Request;

class UserConnectionController extends Controller
{
    public function store(UserConnectionStoreRequest $request)
    {
        $input = $request->validated();
        UserConnectionStoreAction::run($input);
        return redirect()->back();
    }

    public function update(UserConnectionUpdateRequest $request, UserConnection $userConnection) {
        $input = $request->validated();
        UserConnectionUpdateAction::run($input, $userConnection);
        return redirect()->back();
    }

    public function destroy(UserConnection $userConnection)
    {
        UserConnectionDestroyAction::run($userConnection);
        return redirect()->back();
    }
}
