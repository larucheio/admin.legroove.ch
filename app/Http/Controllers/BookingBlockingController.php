<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingBlocking;

class BookingBlockingController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(BookingBlocking::class, 'booking_blocking');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookingBlockings = BookingBlocking::orderByDesc('from')->orderByDesc('to')->get();

        return view('booking_blocking.index', compact('bookingBlockings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking_blocking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blocking = BookingBlocking::create($request->all());

        return redirect()->route('booking_blocking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingBlocking  $bookingBlocking
     * @return \Illuminate\Http\Response
     */
    public function show(BookingBlocking $bookingBlocking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingBlocking  $bookingBlocking
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingBlocking $bookingBlocking)
    {
        return view('booking_blocking.edit', compact('bookingBlocking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\BookingBlocking  $bookingBlocking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingBlocking $bookingBlocking)
    {
        $bookingBlocking->update($request->all());

        return redirect()->route('booking_blocking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingBlocking  $bookingBlocking
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingBlocking $bookingBlocking)
    {
        $bookingBlocking->delete();

        return redirect()->route('booking_blocking.index');
    }
}
