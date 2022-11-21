<?php

namespace App\Policies;

use App\Models\CustomPage;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomPagePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {



        // if custom page is not related with business
        if (request()->customPage instanceof  CustomPage && request()->business != request()->customPage->business_id) {

            return abort(403, "no relation");
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($user)
    {
        return $user->role < 5;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomPage  $customPage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, CustomPage $customPage)
    {
        return $user->role < 5;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($user)
    {

        return $user->role < 4;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomPage  $CustomPage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, CustomPage $customPage)
    {

        return $user->role < 4;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomPage  $CustomPage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, CustomPage $customPage)
    {

        return $user->role < 4;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomPage  $CustomPage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore($user, CustomPage $customPage)
    {
        return $user->role < 4;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomPage  $CustomPage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete($user, CustomPage $customPage)
    {

        return $user->role < 4;
    }
}
