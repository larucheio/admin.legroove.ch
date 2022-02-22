<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Activity;
use Illuminate\Http\Request;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = [
            'bookings' => Booking::where('validated', false)->orderByDesc('date')->get(),
            'activities' => Activity::where('validated', false)->orderByDesc('date')->get(),
        ];

        return view('dashboard', compact('bookings'));
    }

    public function bookings(Request $request)
    {
        $bookings = Booking::whereBetween('date', [$request->start, $request->end])->get();

        return response()->json($bookings);
    }

    public function activities(Request $request)
    {
        $activities = Activity::whereBetween('date', [$request->start, $request->end])->get();

        return response()->json($activities);
    }
}
