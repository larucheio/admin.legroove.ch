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
                'public_reservation_from' => $request->public_reservation_from,
                'public_reservation_to' => $request->public_reservation_to,
                'internal_reservation_from' => $request->internal_reservation_from,
                'internal_reservation_to' => $request->internal_reservation_to,
            ]);
        } else {
            DB::table('settings')->insert([
                'public_reservation_from' => $request->public_reservation_from,
                'public_reservation_to' => $request->public_reservation_to,
                'internal_reservation_from' => $request->internal_reservation_from,
                'internal_reservation_to' => $request->internal_reservation_to,
            ]);
        }

        return redirect()->route('settings.index');
    }
}
