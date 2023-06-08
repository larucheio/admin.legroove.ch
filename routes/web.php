<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingBlockingController;
use App\Http\Controllers\BookingMediaController;
use App\Http\Controllers\BookingRiderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
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
    Route::get('/fullcalendar/json/bookings', [DashboardController::class, 'bookings']);
    Route::get('/fullcalendar/json/bookingsUnvalidated', [DashboardController::class, 'bookingsUnvalidated']);
    Route::get('/fullcalendar/json/activities', [DashboardController::class, 'activities']);
    Route::get('/fullcalendar/json/activitiesUnvalidated', [DashboardController::class, 'activitiesUnvalidated']);
    Route::get('/fullcalendar/json/blocked', [DashboardController::class, 'blocked']);

    Route::resource('booking_blocking', BookingBlockingController::class)->except(['show']);

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');

    Route::get('/emails', [EmailController::class, 'edit'])->name('emails.edit');
    Route::post('/emails', [EmailController::class, 'update'])->name('emails.update');

    Route::resource('accounts', AccountController::class)->except(['show']);
    Route::resource('spaces', SpaceController::class)->except(['show']);

    Route::get('/bookings/{booking}/validate', [BookingController::class, 'validateBooking'])->name('bookings.validate');
    Route::get('/bookings/{booking}/invalidate', [BookingController::class, 'invalidateBooking'])->name('bookings.invalidate');
    Route::get('/bookings/{booking}/revive', [BookingController::class, 'revive'])->name('bookings.revive');
    Route::resource('bookings', BookingController::class)->except(['index']);
    Route::resource('bookings.medias', BookingMediaController::class)->only(['destroy'])->parameters(['medias' => 'booking_media']);
    Route::resource('bookings.riders', BookingRiderController::class)->only(['destroy'])->parameters(['riders' => 'booking_rider']);

    Route::get('/activities/{activity}/validate', [ActivityController::class, 'validateBooking'])->name('activities.validate');
    Route::get('/activities/{activity}/invalidate', [ActivityController::class, 'invalidateBooking'])->name('activities.invalidate');
    Route::resource('activities', ActivityController::class)->except(['index']);
});
