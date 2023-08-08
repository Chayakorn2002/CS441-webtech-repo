<?php

namespace App\Policies;

use App\Models\Enums\PlaylistAccessibility;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlaylistPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool 
    // $user refer to the logged in user
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Playlist $playlist): bool
    // referred to the logged in user and the current playlist that are trying to view
    {
        return ($playlist->isPublic()) or (
                $playlist->isPrivate() and $playlist->isOwnedBy($user->id)
            );
    }

   // permission to ... a playlist
    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Playlist $playlist): bool
    {
        return $playlist->isOwnedBy($user->id);
    }

    public function delete(User $user, Playlist $playlist): bool
    {
        return false;
    }

    public function restore(User $user, Playlist $playlist): bool
    {
        return false;
    }

    public function forceDelete(User $user, Playlist $playlist): bool
    {
        return false;
    }
}
