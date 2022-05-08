<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return Response
     */
    public function viewAny(): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return Response
     */
    public function view(): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response
     */
    public function create(User $user): Response
    {
        return $user->hasRole('admin') ? Response::allow() : Response::deny();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Group $group
     * @return Response
     */
    public function update(User $user, Group $group): Response
    {
        if($group->curator->id === $user->id || $user->hasRole('admin')) {
            return Response::allow();
        }

        return Response::deny();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Group $group
     * @return Response
     */
    public function delete(User $user, Group $group): Response
    {
        return $user->hasRole('admin') ? Response::allow() : Response::deny();
    }
}
