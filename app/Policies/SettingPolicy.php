<?php

namespace App\Policies;

use App\Models\User;

class SettingPolicy
{
    public function read(User $user)
    {
        return $this->getPermission($user, 7);
    }
    
    public function general(User $user)
    {
        return $this->getPermission($user, 8);
    }

    public function email(User $user)
    {
        return $this->getPermission($user, 9);
    }

    private function getPermission($user, $permission_id)
    {
        // Allow full access if the user's ID is 1
        if ($user->id === 1) {
            return true;
        }

        return $user->permissions->contains('id', $permission_id);
    }

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }
}
