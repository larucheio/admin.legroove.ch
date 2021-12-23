<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class InternalBooking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'title',
        'opening_hours',
        'contact',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date',
        'validated' => 'boolean',
    ];

    public function validateBooking()
    {
        if (Auth::user()->can('validateBooking', $this)) {
            $this->validated = true;
            $this->save();
        }
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function spaces()
    {
        return $this->belongsToMany(Space::class);
    }
}
