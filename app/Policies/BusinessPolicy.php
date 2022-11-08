<?php

namespace App\Policies;

use App\Models\Business;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class BusinessPolicy
{
    use HandlesAuthorization;




    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\* $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($user, Business $business)
    {



        if ($user->getTable() === 'users' && $user->id === $business->user_id) {
            return true;
        }


        if (
            $user->getTable() === 'employees' &&
            $user->business_id === $business->id &&
            isset($user->role) &&
            $user->role <= 10
        ) {

            return true;
        }


        return false;
    }

    /**
     * Determine whether the user can view the model.
     * Alias SHOW
     * @param  \App\Models\User  $user
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, Business $business)
    {



        if ($user->getTable() === 'users' && $user->id === $business->user_id) {
            return true;
        }


        if (
            $user->getTable() === 'employees' &&
            $user->business_id === $business->id &&
            isset($user->role) &&
            $user->role <= 4
        ) {

            return true;
        }


        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($user, Business $business)
    {

        if ($user->getTable() === 'users' && $user->id === $business->user_id) {
            return true;
        }


        if (
            $user->getTable() === 'employees' &&
            $user->business_id === $business->id &&
            isset($user->role) &&
            $user->role <= 3
        ) {

            return true;
        }


        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, Business $business)
    {



        if ($user->getTable() === 'users' && $user->id === $business->user_id) {
            return true;
        }


        if (
            $user->getTable() === 'employees' &&
            $user->business_id === $business->id &&
            isset($user->role) &&
            $user->role <= 3
        ) {

            return true;
        }


        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, Business $business)
    {


        if ($user->getTable() === 'users' && $user->id === $business->user_id) {
            return true;
        }


        if (
            $user->getTable() === 'employees' &&
            $user->business_id === $business->id &&
            isset($user->role) &&
            $user->role <= 3
        ) {

            return true;
        }


        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore($user, Business $business)
    {
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete($user, Business $business)
    {
        //
    }
}
