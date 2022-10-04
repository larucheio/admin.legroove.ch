<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingRider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'path',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
