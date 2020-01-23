<?php

namespace App\Policies;

use App\Music;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MusicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any musics.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the music.
     *
     * @param  \App\User  $user
     * @param  \App\Music  $music
     * @return mixed
     */
    public function view(User $user, Music $music)
    {
        //
    }

    /**
     * Determine whether the user can create musics.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the music.
     *
     * @param  \App\User  $user
     * @param  \App\Music  $music
     * @return mixed
     */
    public function update(User $user, Music $music)
    {
        //
    }

    /**
     * Determine whether the user can delete the music.
     *
     * @param  \App\User  $user
     * @param  \App\Music  $music
     * @return mixed
     */
    public function delete(User $user, Music $music)
    {

        return $user->permission = 1;
//        return in_array($user->permission, [
//        1
//    ]);
    }

    /**
     * Determine whether the user can restore the music.
     *
     * @param  \App\User  $user
     * @param  \App\Music  $music
     * @return mixed
     */
    public function restore(User $user, Music $music)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the music.
     *
     * @param  \App\User  $user
     * @param  \App\Music  $music
     * @return mixed
     */
    public function forceDelete(User $user, Music $music)
    {
        //
    }
}
