<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    ];

    public function spaces()
    {
        return $this->belongsToMany(Space::class);
    }
}
