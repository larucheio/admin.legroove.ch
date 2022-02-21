<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index()
    {
        if (!Auth::user()->isAdmin) {
            abort(403);
        }

        $settings = DB::table('settings')->first();

        return view('settings', compact('settings'));
    }

    public function update(Request $request)
    {
        if (!Auth::user()->isAdmin) {
            abort(403);
        }

        $settings = DB::table('settings')->first();

        if ($settings) {
            DB::table('settings')
            ->where('id', $settings->id)
            ->update([
                'booking_dateplus_min' => $request->booking_dateplus_min,
                'booking_dateplus_to' => $request->booking_dateplus_to,
                'activity_dateplus_from' => $request->activity_dateplus_from,
                'activity_dateplus_to' => $request->activity_dateplus_to,
            ]);
        } else {
            DB::table('settings')->insert([
                'booking_dateplus_min' => $request->booking_dateplus_min,
                'booking_dateplus_to' => $request->booking_dateplus_to,
                'activity_dateplus_from' => $request->activity_dateplus_from,
                'activity_dateplus_to' => $request->activity_dateplus_to,
            ]);
        }

        return redirect()->route('settings.index');
    }
}
