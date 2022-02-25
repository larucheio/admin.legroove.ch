<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class ActivityController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Activity::class, 'activity');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spaces = Space::orderBy('name')->get();
        $bookingLimitations = Activity::bookingLimitations();

        return view('activities.create', compact('spaces', 'bookingLimitations'));
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

        $activity = $user->activities()->create($request->all());
        $activity->spaces()->sync($request->spaces);
        $activity->validateBooking();

        return redirect()->route('activities.show', $activity);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $spaces = Space::orderBy('name')->get();
        $bookingLimitations = Activity::bookingLimitations();

        return view('activities.edit', compact('activity', 'spaces', 'bookingLimitations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $activity->update($request->all());
        $activity->spaces()->sync($request->spaces);

        return redirect()->route('activities.show', $activity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('activities.index');
    }

    /**
     * Validate the specified resource in storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function validateBooking(Activity $activity)
    {
        $activity->validateBooking();

        return redirect()->route('activities.show', $activity);
    }

    /**
     * Invalidate the specified resource in storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function invalidateBooking(Activity $activity)
    {
        $activity->invalidateBooking();

        return redirect()->route('activities.show', $activity);
    }
}
