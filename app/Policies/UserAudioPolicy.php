<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserAudio;
use Illuminate\Auth\Access\Response;

class UserAudioPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UserAudio $userAudio): bool
    {
        return $user->id == $userAudio->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UserAudio $userAudio): bool
    {
        return $this->view($user, $userAudio);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserAudio $userAudio): bool
    {
        return $this->update($user, $userAudio);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UserAudio $userAudio): bool
    {
        return $this->update($user, $userAudio);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UserAudio $userAudio): bool
    {
        return $this->delete($user, $userAudio);
    }
}
