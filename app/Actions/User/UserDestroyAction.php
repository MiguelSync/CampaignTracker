<?php

namespace App\Actions\User;

use App\Models\User;
use Auth;
use Exception;
use Lorisleiva\Actions\Concerns\AsAction;

class UserDestroyAction
{
    use AsAction;

    public function handle(User $user)
    {
        $this->validateSameUserLogged($user);
        $user->delete();
    }

    /**
     * Validate if the user that is been removed is the same that is logged
     * @param User $user
     * @throws Exception
     */
    private function validateSameUserLogged(User $user) {
        $idUserLogged = Auth::user()->id;
        $idUser = $user->id;

        if ($idUserLogged == $idUser) {
            throw new Exception('It´s not possible to exclude your user using this routine');
        }
    }
}
