<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Booking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'title',
        'description',
        'entry_price',
        'links',
        'opening_hours',
        'style',
        'estimated_attendance',
        'type',
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

    public static function bookingLimitations()
    {
        $today = Carbon::today();
        $settings = DB::table('settings')->first();

        $min = $settings ? $today->copy()->addDays($settings->public_reservation_from) : $today;
        $max = $settings ? $today->copy()->addDays($settings->public_reservation_to) : $today;

        $disabled = [];

        // Add blocked dates to disabled dates
        $bookingBlocking = BookingBlocking::where('from', '>=', $min)->get();
        foreach ($bookingBlocking as $blocking) {
            $dates = CarbonPeriod::since($blocking->from)->until($blocking->to)->toArray();

            foreach ($dates as $date) {
                array_push($disabled, $date->toDateString());
            }
        }

        // Add already made bookings to disabled dates
        $bookings = Booking::where('date', '>=', $min)->where('date', '<', $max)->toBase()->pluck('date')->toArray();

        $disabled = array_unique(array_merge($disabled, $bookings));

        return [
            'min' => $min->isoFormat('YYYY-MM-DD'),
            'max' => $max->isoFormat('YYYY-MM-DD'),
            'disabled' => $disabled,
        ];
    }

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

    public function getIsPastAttribute()
    {
        return $this->date->isPast();
    }
}
