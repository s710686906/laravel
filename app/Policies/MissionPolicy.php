<?php

namespace App\Policies;

use App\Model\Mission;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MissionPolicy
{
    use HandlesAuthorization;
    public function destroy(User $user, Mission $mission)
    {
        return $user->id === $mission->user_id;
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
