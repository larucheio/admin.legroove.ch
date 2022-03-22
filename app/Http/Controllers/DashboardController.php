<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function bookings(Request $request)
    {
        $bookings = Booking::where('validated', true)->where('start', '>=', $request->start)->where('end', '<=', $request->end)->get();

        return response()->json($bookings);
    }

    public function bookingsUnvalidated(Request $request)
    {
        $bookings = Booking::where('validated', false)
            ->where('start', '>=', $request->start)->where('end', '<=', $request->end)
            ->when(!Auth::user()->isAdmin, function ($query) {
                $query->where('account_id', '=', Auth::user()->id);
            })->get();

        return response()->json($bookings);
    }

    public function activities(Request $request)
    {
        $activities = Activity::where('validated', true)->where('start', '>=', $request->start)->where('end', '<=', $request->end)->get();
        $activitiesRecurring = Activity::where('validated', true)->where('startRecur', '<=', $request->start)->get();

        return response()->json($activities->merge($activitiesRecurring));
    }

    public function activitiesUnvalidated(Request $request)
    {
        $activities = Activity::where('validated', false)
            ->when(!Auth::user()->isAdmin, function ($query) {
                $query->where('account_id', '=', Auth::user()->id);
            })->get();

        return response()->json($activities);
    }
}
