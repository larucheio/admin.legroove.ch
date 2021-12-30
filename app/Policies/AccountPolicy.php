<?php

namespace App\Policies;

use App\Models\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
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
     * @param  \App\Models\Account  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Account $account, Account $model)
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
     * @param  \App\Models\Account  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Account $account, Account $model)
    {
        return $account->isAdmin;
    }

    /**
     * Determine whether the account can delete the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Account  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Account $account, Account $model)
    {
        return $account->isAdmin;
    }

    /**
     * Determine whether the account can restore the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Account  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Account $account, Account $model)
    {
        //
    }

    /**
     * Determine whether the account can permanently delete the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Account  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Account $account, Account $model)
    {
        //
    }
}
