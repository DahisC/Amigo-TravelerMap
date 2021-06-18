<?php

namespace App\Policies;

use App\Map;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class MapPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role === "Admin" | $user->role === "Guider" | $user->role === "Traveler";
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user, Map $maps)
    {
        // dd('MapPolicy');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // return $user->role === "Admin" | $user->role === "Guider" | $user->role === "Traveler";
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function edit(User $user, Map $map)
    {
        Auth::user();
        dd('MapPolicy',$user->id,$map);
        return $user->id === $map->user_id | $user->id === 1;
    }
    public function update(User $user, Map $maps)
    {
        dd('MapPolicy');
        dd(1);
        return $user->id === $maps->user_id | $user->id === 1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Map $maps)
    {
        // dd('MapPolicy');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(User $user, Map $maps)
    {
        dd('MapPolicy');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Map $maps)
    {
        // dd('MapPolicy');
    }
}
