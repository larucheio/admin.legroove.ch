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
        'title',
        'start',
        'end',
        'price',
        'description',
        'type',
        'organizer',
        'association_name',
        'communication_links',
        'technical_needs',
        'technical_light_contact',
        'technical_sound_contact',
        'groove_referents',
        'groove_estimated_attendance',
        'groove_perm',
        'groove_accueil_artiste',
        'groove_bar',
        'groove_accueil',
        'groove_benevoles_bar',
        'groove_benevoles_vestiaires',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
        'validated' => 'boolean',
    ];

    protected $appends = ['url'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function medias()
    {
        return $this->hasMany(BookingMedia::class);
    }

    public function getDateAttribute()
    {
        return $this->start . ' ' . $this->end;
    }

    public function getOrganizerDisplayAttribute()
    {
        switch ($this->organizer) {
            case 'collectifnocturne':
                return 'Collectif Nocturne';
                break;
            case 'corner25':
                return 'Corner 25';
                break;
        }
    }

    public function getIsPastAttribute()
    {
        return $this->end->isPast();
    }

    public function getUrlAttribute()
    {
        return route('bookings.show', $this->id);
    }

    public function storeMedias($request)
    {
        if ($request->hasfile('medias')) {
            foreach ($request->file('medias') as $file) {
                $path = $file->store('bookings/medias', 'public');
                $this->medias()->create(['path' => $path]);
            }
        }
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

    public static function bookingLimitations($end = false)
    {
        $today = Carbon::today();
        $settings = DB::table('settings')->first();

        $min = $settings ? $today->copy()->addDays($settings->booking_dateplus_min) : $today;
        $max = $settings ? $today->copy()->addDays($settings->booking_dateplus_to) : $today->copy()->addYear();

        if (Auth::user()->isAdmin) {
            $min = $today;
        }

        $disabled = [];

        if (!Auth::user()->isAdmin) {
            // Add blocked dates to disabled dates
            $bookingBlocking = BookingBlocking::whereIn('type_to_block', ['booking', 'activity,booking'])->where('from', '>=', $min)->get();
            foreach ($bookingBlocking as $blocking) {
                $dates = CarbonPeriod::since($blocking->from)->until($blocking->to)->toArray();

                foreach ($dates as $date) {
                    array_push($disabled, $date->toDateString());
                }
            }
        }

        if (!$end) {
            // Add already made bookings to disabled dates
            $bookings = Booking::where('start', '>=', $min)->where('end', '<', $max)->toBase()->pluck('start')->toArray();
            $disabled = array_merge($disabled, $bookings);
        }

        $disabled = array_unique($disabled);

        return [
            'min' => $min->isoFormat('YYYY-MM-DD'),
            'max' => $max->isoFormat('YYYY-MM-DD'),
            'disabled' => $disabled,
        ];
    }
}
