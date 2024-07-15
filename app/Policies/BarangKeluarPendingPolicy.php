<?php

namespace App\Policies;

use App\Models\BarangKeluarPending;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BarangKeluarPendingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Admin Gudang', 'Kepala Gudang', 'Staff Gudang']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BarangKeluarPending $barangKeluarPending): bool
    {
        return $user->hasRole(['Admin Gudang', 'Kepala Gudang', 'Staff Gudang']);
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
    public function update(User $user, BarangKeluarPending $barangKeluarPending): bool
    {
        return $user->hasRole(['Admin Gudang', 'Kepala Gudang', 'Staff Gudang']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BarangKeluarPending $barangKeluarPending): bool
    {
        return $user->hasRole('Admin Gudang');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BarangKeluarPending $barangKeluarPending): bool
    {
        return $user->hasRole(['Admin Gudang', 'Kepala Gudang', 'Staff Gudang']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BarangKeluarPending $barangKeluarPending): bool
    {
        return $user->hasRole('Admin Gudang');
    }

    public function konfirmasi(User $user, BarangKeluarPending $barangKeluarPending): bool
    {
        return $user->hasRole(['Kepala Gudang', 'Staff Gudang']);
    }
}
