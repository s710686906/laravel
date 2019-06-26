<?php

namespace App\Policies;

use App\Model\Bills;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BillsPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Bills $bill)
    {
        return $user->id === $bill->user_id;
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
