<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function read(User $user)
    {
        return $this->getPermission($user, 1);
    }

    public function create(User $user)
    {
        return $this->getPermission($user, 2);
    }

    public function edit(User $user)
    {
        return $this->getPermission($user, 3);
    }

    public function delete(User $user)
    {
        return $this->getPermission($user, 4);
    }

    public function readPermission(User $user)
    {
        return $this->getPermission($user, 5);
    }

    public function editPermission(User $user)
    {
        return $this->getPermission($user, 6);
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
