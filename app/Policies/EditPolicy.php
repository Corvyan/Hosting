<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Competition;
use Illuminate\Auth\Access\HandlesAuthorization;

class EditPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function edit(User $user, Competition $competition)
    {
        return $user->id === $competition->user_id;
    }
}
