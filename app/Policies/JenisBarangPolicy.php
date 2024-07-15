<?php

namespace App\Policies;

use App\Models\JenisBarang;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JenisBarangPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('Admin Gudang');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JenisBarang $jenisBarang): bool
    {
        return $user->hasRole('Admin Gudang');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Admin Gudang');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JenisBarang $jenisBarang): bool
    {
        return $user->hasRole('Admin Gudang');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JenisBarang $jenisBarang): bool
    {
        return $user->hasRole('Admin Gudang');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JenisBarang $jenisBarang): bool
    {
        return $user->hasRole('Admin Gudang');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JenisBarang $jenisBarang): bool
    {
        return $user->hasRole('Admin Gudang');
    }
}
