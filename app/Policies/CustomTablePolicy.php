<?php

namespace App\Policies;

use App\Models\CustomTable;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomTablePolicy
{
    use HandlesAuthorization;



    public function __construct()
    {



        $table = request()->table;




        // if custom page is not related with business


        if ($table instanceof CustomTable) {
            $customPage = $table->belongCustomPage;
            if (
                $customPage->id != request()->customPage ||
                $customPage->business_id != request()->business
            ) {
                return abort(403, "no relatioggn");
            }
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomTable  $customTable
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, CustomTable $customTable)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomTable  $customTable
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, CustomTable $customTable)
    {
        // dd($customTable->belongCustomPage);
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomTable  $customTable
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, CustomTable $customTable)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomTable  $customTable
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore($user, CustomTable $customTable)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CustomTable  $customTable
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete($user, CustomTable $customTable)
    {
        //
    }
}
