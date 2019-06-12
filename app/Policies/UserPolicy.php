<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $signedInUser, User $user)
    {
        return $signedInUser->id === $user->id;
    }
}
