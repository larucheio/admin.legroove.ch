<?php

namespace App\Policies;

use App\Models\Account;
use App\Models\Space;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpacePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the account can view any models.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Account $account)
    {
        return $account->isAdmin;
    }

    /**
     * Determine whether the account can view the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Space  $space
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Account $account, Space $space)
    {
        return $account->isAdmin;
    }

    /**
     * Determine whether the account can create models.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Account $account)
    {
        return $account->isAdmin;
    }

    /**
     * Determine whether the account can update the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Space  $space
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Account $account, Space $space)
    {
        return $account->isAdmin;
    }

    /**
     * Determine whether the account can delete the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Space  $space
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Account $account, Space $space)
    {
        return $account->isAdmin;
    }

    /**
     * Determine whether the account can restore the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Space  $space
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Account $account, Space $space)
    {
        return $account->isAdmin;
    }

    /**
     * Determine whether the account can permanently delete the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Space  $space
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Account $account, Space $space)
    {
        return $account->isAdmin;
    }
}
