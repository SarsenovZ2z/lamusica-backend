<?php

namespace App\Policies;

use App\Models\Playlist;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlaylistPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // TODO: check if user is not banned
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Playlist $playlist): bool
    {
        return $this->update($user, $playlist);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->viewAny($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Playlist $playlist): bool
    {
        return $playlist->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Playlist $playlist): bool
    {
        return $this->update($user, $playlist);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Playlist $playlist): bool
    {
        return $this->update($user, $playlist);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Playlist $playlist): bool
    {
        return $this->update($user, $playlist);
    }
}
