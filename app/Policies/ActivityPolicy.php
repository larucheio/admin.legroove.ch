<?php

namespace App\Policies;

use App\Models\Account;
use App\Models\Activity;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
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
        return $account->isTeam;
    }

    /**
     * Determine whether the account can view the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Account $account, Activity $activity)
    {
        return $account->isTeam;
    }

    /**
     * Determine whether the account can create models.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Account $account)
    {
        return $account->isTeam;
    }

    /**
     * Determine whether the account can update the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Account $account, Activity $activity)
    {
        if ($account->isAdmin) {
            return true;
        }

        if ($activity->validated) {
            return false;
        }

        if ($activity->isPast) {
            return false;
        }

        return $account->id === $activity->account_id;
    }

    /**
     * Determine whether the account can delete the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Account $account, Activity $activity)
    {
        if ($account->isAdmin) {
            return true;
        }

        if ($activity->validated) {
            return false;
        }

        if ($activity->isPast) {
            return false;
        }

        return $account->id === $activity->account_id;
    }

    /**
     * Determine whether the account can restore the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Account $account, Activity $activity)
    {
        //
    }

    /**
     * Determine whether the account can permanently delete the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Account $account, Activity $activity)
    {
        //
    }

    /**
     * Determine whether the account can validate the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function validateBooking(Account $account, Activity $activity)
    {
        if ($activity->validated) {
            return false;
        }

        return $account->isAdmin;
    }

    /**
     * Determine whether the account can invalidate the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function invalidateBooking(Account $account, Activity $activity)
    {
        return $activity->validated && $account->isAdmin;
    }
}
