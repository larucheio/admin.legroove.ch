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
        $today = Carbon::today();

        $today = [
            'bookings' => Booking::whereDate('date', $today)->get(),
            'activities' => Activity::whereDate('date', $today)->get(),
        ];

        $bookings = [
            'bookings' => Booking::where('validated', false)->orderByDesc('date')->get(),
            'activities' => Activity::where('validated', false)->orderByDesc('date')->get(),
        ];

        return view('dashboard', compact('today', 'bookings'));
    }
}
