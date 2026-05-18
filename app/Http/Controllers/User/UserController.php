<?php

namespace App\Http\Controllers\User;

use App\Actions\User\UserDestroyAction;
use App\Enum\UserEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Throwable;

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

    public function destroy(User $user) {
        try {
            UserDestroyAction::run($user);
            return redirect()->route('user.index');
        } catch (Throwable $ex) {
            return $this->handleExceptionBackWithErrors($ex);
        } catch (Exception $ex) {
            return $this->handleExceptionBackWithErrors($ex);
        }
    }
}
