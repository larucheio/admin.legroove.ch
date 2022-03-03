<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Booking::class, 'booking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookingLimitationsStart = Booking::bookingLimitations();
        $bookingLimitationsEnd = Booking::bookingLimitations('end');

        return view('bookings.create', compact('bookingLimitationsStart', 'bookingLimitationsEnd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $booking = $user->bookings()->create($request->all());
        $booking->validateBooking();
        $booking->storeMedias($request);

        return redirect()->route('bookings.show', $booking);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $bookingLimitationsStart = Booking::bookingLimitations();
        $bookingLimitationsEnd = Booking::bookingLimitations('end');

        return view('bookings.edit', compact('booking', 'bookingLimitationsStart', 'bookingLimitationsEnd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        if (!$booking->validated || Auth::user()->isPR) {
            $booking->update($request->all());
        } else {
            $booking->update([
                'description' => $request->description,
                'links' => $request->links,
            ]);
        }

        $booking->storeMedias($request);

        return redirect()->route('bookings.show', $booking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        Storage::disk('public')->delete($booking->medias->pluck('path')->toArray());
        $booking->delete();

        return redirect()->route('dashboard');
    }

    /**
     * Validate the specified resource in storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function validateBooking(Booking $booking)
    {
        $booking->validateBooking();

        return redirect()->route('bookings.show', $booking);
    }

    /**
     * Invalidate the specified resource in storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function invalidateBooking(Booking $booking)
    {
        $booking->invalidateBooking();

        return redirect()->route('bookings.show', $booking);
    }
}
