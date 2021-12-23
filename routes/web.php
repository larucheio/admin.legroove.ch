<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\InternalBookingController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\UserController;

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
    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('users', UserController::class)->except(['show', 'destroy']);
    Route::resource('spaces', SpaceController::class)->except(['show']);
    Route::resource('bookings', BookingController::class);
    Route::resource('internal_bookings', InternalBookingController::class);
});
