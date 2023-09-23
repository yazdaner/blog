<?php

namespace App\Policies;

use App\Models\User;
use App\Models\post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, post $post)
    {
        return $user->getUserRole() === 'admin' || $user->id === $post->user_id;
    }

}
