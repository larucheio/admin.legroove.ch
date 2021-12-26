<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingBlocking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'from',
        'to',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'from' => 'date',
        'to' => 'date',
    ];
}
