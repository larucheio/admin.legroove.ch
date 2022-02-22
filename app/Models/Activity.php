<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Activity extends Model
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
        'complementary_informations',
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

    protected $appends = ['url'];

    public static function bookingLimitations()
    {
        $today = Carbon::today();
        $settings = DB::table('settings')->first();

        $min = $settings ? $today->copy()->addDays($settings->activity_dateplus_from) : $today;
        $max = $settings ? $today->copy()->addDays($settings->activity_dateplus_to) : $today->copy()->addYear();

        if (Auth::user()->isAdmin) {
            $min = $today;
        }

        $disabled = [];

        if (!Auth::user()->isAdmin) {
            // Add blocked dates to disabled dates
            $bookingBlocking = BookingBlocking::whereIn('type_to_block', ['activity', 'activity,booking'])->where('from', '>=', $min)->get();
            foreach ($bookingBlocking as $blocking) {
                $dates = CarbonPeriod::since($blocking->from)->until($blocking->to)->toArray();

                foreach ($dates as $date) {
                    array_push($disabled, $date->toDateString());
                }
            }
        }

        $disabled = array_unique($disabled);

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

    public function invalidateBooking()
    {
        if (Auth::user()->can('invalidateBooking', $this)) {
            $this->validated = false;
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

    public function getIsPastAttribute()
    {
        return $this->date->isPast();
    }

    public function getUrlAttribute()
    {
        return route('activities.show', $this->id);
    }
}
