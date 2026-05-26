<?php

namespace App\Http\Controllers\api;

use App\Actions\User\UserDestroyAction;
use App\Actions\User\UserUpdateAction;
use App\Enum\User\UserPlaystyleEnum;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Exception;
use Throwable;

class UserController extends \App\Http\Controllers\Controller
{

    public function index() {
        $users = User::all();
        return response()->json(['content' => $users]);
    }

    public function show(User $user) {
        return response()->json(['content' => $user]);
    }

    public function update(UserUpdateRequest $request, User $user) {
        try {
            $input = $request->validated();
            UserUpdateAction::run($input, $user);
            return response()->json(['message' => 'Usuário alterado com sucesso!', 'content' => $user]);
        } catch (Throwable $ex) {
            return $this->handleExceptionAPI($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionAPI($ex);
        }
    }

    public function destroy(User $user) {
        try {
            UserDestroyAction::run($user);
            return response()->json(['message' => 'Usuário removido com sucesso!']);
        } catch (Throwable $ex) {
            return $this->handleExceptionBackWithErrors($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionBackWithErrors($ex);
        }
    }
}
