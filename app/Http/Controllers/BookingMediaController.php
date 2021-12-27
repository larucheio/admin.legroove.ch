<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingMedia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookingMediaController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(BookingMedia::class, 'booking_media');
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
     * @param  \App\Models\BookingMedia  $bookingMedia
     * @return \Illuminate\Http\Response
     */
    public function show(BookingMedia $bookingMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingMedia  $bookingMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingMedia $bookingMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\BookingMedia  $bookingMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingMedia $bookingMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @param  \App\Models\BookingMedia  $bookingMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking, BookingMedia $bookingMedia)
    {
        Storage::disk('public')->delete($bookingMedia->path);
        $bookingMedia->delete();

        return redirect()->route('bookings.show', $booking);
    }
}
