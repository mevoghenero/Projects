<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function superadmin(User $admin)
    {
        if ($admin->status == 1) 
        {
            return true;
        }
        return false;
        
    }

    public function manager(User $admin)
    {
        if ($admin->status == 2) 
        {
            return true;
        } 
        return false;

    }

}
