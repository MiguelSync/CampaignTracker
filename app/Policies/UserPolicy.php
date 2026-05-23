<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function isUserLoggedProfile(User $user, User $userProfile) {
        return $user->id == $userProfile->id;
    }
}
