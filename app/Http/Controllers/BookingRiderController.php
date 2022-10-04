<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingRider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookingRiderController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(BookingRider::class, 'booking_rider');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingRider  $bookingRider
     * @return \Illuminate\Http\Response
     */
    public function show(BookingRider $bookingRider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingRider  $bookingRider
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingRider $bookingRider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\BookingRider  $bookingRider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingRider $bookingRider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @param  \App\Models\BookingRider  $bookingRider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking, BookingRider $bookingRider)
    {
        Storage::disk('public')->delete($bookingRider->path);
        $bookingRider->delete();

        return redirect()->route('bookings.show', $booking);
    }
}
