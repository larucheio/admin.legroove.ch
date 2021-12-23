<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'identifier',
        'email',
        'password',
        'contact',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function internalBookings()
    {
        return $this->hasMany(InternalBooking::class);
    }

    public function getRoleDisplayAttribute()
    {
        switch ($this->role) {
            case 'admin':
                return 'Admin';
            case 'pr':
                return 'Communication';
            case 'team':
                return 'Programmation/Équipe';
        }
    }

    public function getIsAdminAttribute()
    {
        return $this->role === 'admin';
    }

    public function getIsPRAttribute()
    {
        if ($this->isAdmin) {
            return true;
        }

        return $this->role === 'pr';
    }

    public function getIsTeamAttribute()
    {
        if ($this->isPR) {
            return true;
        }

        return $this->role === 'team';
    }
}
