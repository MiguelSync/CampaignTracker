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
            return $this->handleDestroyException($ex);
        } catch (Exception $ex) {
            return $this->handleDestroyException($ex);
        }
    }

    /**
     * Handle any exception that occurs when executing a destroy request
     * @param Throwable $ex
     * @return \Illuminate\Http\RedirectResponse
     */
    private function handleDestroyException(Throwable $ex) {
        return redirect()->back()->withErrors([
            'erro' => $ex->getMessage()                        
        ]);
    }
}
