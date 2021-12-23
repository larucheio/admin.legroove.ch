<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\InternalBooking;
use Illuminate\Http\Request;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $today = [
            'public' => Booking::whereDate('date', $today)->get(),
            'internal' => InternalBooking::whereDate('date', $today)->get(),
        ];

        $bookings = [
            'public' => Booking::where('validated', false)->orderByDesc('date')->get(),
            'internal' => InternalBooking::where('validated', false)->orderByDesc('date')->get(),
        ];

        return view('dashboard', compact('today', 'bookings'));
    }
}
