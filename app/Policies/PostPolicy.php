<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Config;

class PostPolicy
{
    use HandlesAuthorization;






    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($user)
    {
        return $user->role < 5;
    }



    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, Post $post)
    {
        $roles = Config::get('roles');


        if ($post->user_id == auth()->user()->id) {
            return true;
        } elseif (
            auth()->user()->role <= $roles["secretarySenior"]
        ) {
            return true;
        }

        return false;
    }
}
