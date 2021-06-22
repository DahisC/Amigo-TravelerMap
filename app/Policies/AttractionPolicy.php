<?php

namespace App\Policies;

use App\Post;
use App\User;
use App\Attraction;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttractionPolicy
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
        // dd('i m here！！！viewAny');
        return $user->role === "Guider";
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Attraction  $attraction
     * @return mixed
     */
    public function view(User $user, Attraction  $attraction)
    {
        return $user->role === "Guider" || $user->role === "Traveler"  && $user->id === $attraction->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role === "Guider";
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Attraction $attraction)
    {
        // dd('i m here','update');
        return ($user->role === "Guider" || $user->role === "Traveler")  && $user->id === $attraction->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Attraction $attraction)
    {
        dd('i m here！！！,delete');
        return $user->id === $attraction->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(User $user, Attraction $attraction)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Attraction $attraction)
    {
        //
    }
}
