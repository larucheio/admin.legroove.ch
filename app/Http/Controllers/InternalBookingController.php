<?php

namespace App\Http\Controllers;

use App\Models\InternalBooking;
use App\Models\Space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class InternalBookingController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(InternalBooking::class, 'internal_booking');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();

        $internalBookings = [
            'actual' => InternalBooking::whereDate('date', '>=', $today)->orderByDesc('date')->get(),
            'past' => InternalBooking::whereDate('date', '<', $today)->orderBy('date')->get(),
        ];

        return view('internal_bookings.index', compact('internalBookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spaces = Space::orderBy('name')->get();

        return view('internal_bookings.create', compact('spaces'));
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

        $internalBooking = $user->internalBookings()->create($request->all());
        $internalBooking->spaces()->sync($request->spaces);
        $internalBooking->validateBooking();

        return redirect()->route('internal_bookings.show', $internalBooking);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InternalBooking  $internalBooking
     * @return \Illuminate\Http\Response
     */
    public function show(InternalBooking $internalBooking)
    {
        return view('internal_bookings.show', compact('internalBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InternalBooking  $internalBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(InternalBooking $internalBooking)
    {
        $spaces = Space::orderBy('name')->get();

        return view('internal_bookings.edit', compact('internalBooking', 'spaces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InternalBooking  $internalBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternalBooking $internalBooking)
    {
        $internalBooking->update($request->all());
        $internalBooking->spaces()->sync($request->spaces);

        return redirect()->route('internal_bookings.show', $internalBooking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InternalBooking  $internalBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternalBooking $internalBooking)
    {
        $internalBooking->delete();

        return redirect()->route('internal_bookings.index');
    }

    /**
     * Validate the specified resource in storage.
     *
     * @param  \App\Models\InternalBooking  $internalBooking
     * @return \Illuminate\Http\Response
     */
    public function validateBooking(InternalBooking $internalBooking)
    {
        $internalBooking->validateBooking();

        return redirect()->route('internal_bookings.show', $internalBooking);
    }
}
