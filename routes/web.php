<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingBlockingController;
use App\Http\Controllers\BookingMediaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InternalBookingController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\SettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('booking_blocking', BookingBlockingController::class)->except(['show']);

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');

    Route::resource('accounts', AccountController::class)->except(['show']);
    Route::resource('spaces', SpaceController::class)->except(['show']);

    Route::get('/bookings/{booking}/validate', [BookingController::class, 'validateBooking'])->name('bookings.validate');
    Route::resource('bookings', BookingController::class);
    Route::resource('bookings.medias', BookingMediaController::class)->only(['destroy'])->parameters(['medias' => 'booking_media']);

    Route::get('/internal_bookings/{internalBooking}/validate', [InternalBookingController::class, 'validateBooking'])->name('internal_bookings.validate');
    Route::resource('internal_bookings', InternalBookingController::class);
});
