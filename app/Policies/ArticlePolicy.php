<?php

namespace App\Policies;

use App\Models\Blog\Article;
use App\Models\Blog\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response
     */
    public function viewAny(User $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Article $article
     * @return Response
     */
    public function view(User $user, Article $article): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @param Blog $blog
     * @return Response
     */
    public function create(User $user, Blog $blog): Response
    {
        if ($user->blog->id === $blog->id) {
            return Response::allow();
        }

        return Response::deny('Not your blog!');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Article $article
     * @return Response
     */
    public function update(User $user, Article $article): Response
    {
        if ($user->blog->id ?? '' === $article->blog->id) {
            return Response::allow();
        }

        return Response::deny();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Article $article
     * @return Response
     */
    public function delete(User $user, Article $article): Response
    {
        if ($user->blog->id ?? '' === $article->blog->id) {
            return Response::allow();
        }

        return Response::deny();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Article $article
     * @return Response
     */
    public function restore(User $user, Article $article): Response
    {
        if ($user->blog->id ?? '' === $article->blog->id) {
            return Response::allow();
        }

        return Response::deny();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Article $article
     * @return Response
     */
    public function forceDelete(User $user, Article $article): Response
    {
        if ($user->blog->id ?? '' === $article->blog->id) {
            return Response::allow();
        }

        return Response::deny();
    }
}
