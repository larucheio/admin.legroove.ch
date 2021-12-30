<?php

namespace App\Policies;

use App\Models\Account;
use App\Models\InternalBooking;
use Illuminate\Auth\Access\HandlesAuthorization;

class InternalBookingPolicy
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
     * @param  \App\Models\InternalBooking  $internalBooking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Account $account, InternalBooking $internalBooking)
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
     * @param  \App\Models\InternalBooking  $internalBooking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Account $account, InternalBooking $internalBooking)
    {
        if ($account->isAdmin) {
            return true;
        }

        if ($internalBooking->validated) {
            return false;
        }

        if ($internalBooking->isPast) {
            return false;
        }

        return $account->id === $internalBooking->account_id;
    }

    /**
     * Determine whether the account can delete the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\InternalBooking  $internalBooking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Account $account, InternalBooking $internalBooking)
    {
        if ($account->isAdmin) {
            return true;
        }

        if ($internalBooking->validated) {
            return false;
        }

        if ($internalBooking->isPast) {
            return false;
        }

        return $account->id === $internalBooking->account_id;
    }

    /**
     * Determine whether the account can restore the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\InternalBooking  $internalBooking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Account $account, InternalBooking $internalBooking)
    {
        //
    }

    /**
     * Determine whether the account can permanently delete the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\InternalBooking  $internalBooking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Account $account, InternalBooking $internalBooking)
    {
        //
    }

    /**
     * Determine whether the account can validate the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\InternalBooking  $internalBooking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function validateBooking(Account $account, InternalBooking $internalBooking)
    {
        if ($internalBooking->validated) {
            return false;
        }

        return $account->isAdmin;
    }

    /**
     * Determine whether the account can invalidate the model.
     *
     * @param  \App\Models\Account  $account
     * @param  \App\Models\InternalBooking  $internalBooking
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function invalidateBooking(Account $account, InternalBooking $internalBooking)
    {
        return $internalBooking->validated && $account->isAdmin;
    }
}
