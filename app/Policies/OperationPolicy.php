<?php

namespace App\Policies;

use App\Models\Operation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OperationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('read-operation', 'api');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->hasPermissionTo('read-operation', 'api');
    }

    public function viewAsOperator(User $user): bool
    {
        return $user->hasPermissionTo('read-operation-as-operator', 'api');
    }

    public function viewAsManager(User $user): bool
    {
        return $user->hasPermissionTo('read-operation-as-manager', 'api');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-operation', 'api');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->hasPermissionTo('update-operation', 'api');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->hasPermissionTo('delete-operation', 'api');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        //
    }
}
