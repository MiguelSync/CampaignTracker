<?php

namespace App\Http\Controllers\api;

use App\Actions\User\UserDestroyAction;
use App\Enum\User\UserPlaystyleEnum;
use App\Models\User;
use Exception;
use Throwable;

class UserController extends \App\Http\Controllers\Controller
{

    public function index() {
        $users = User::all();
        return response()->json(['content' => $users]);
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
