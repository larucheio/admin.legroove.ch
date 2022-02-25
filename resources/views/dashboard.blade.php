@extends('layouts.main')

@section('content')
    <div class="container-fluid">

        <div class="row g-3">
            <div class="col-lg ">
                @if (Auth::user()->isTeam)
                    <p>
                        <a href="{{ route('bookings.create') }}" class="btn btn-primary">+ Programmation</a>
                    </p>
                    <p>
                        <a href="{{ route('activities.create') }}" class="btn btn-primary">+ Activité</a>
                    </p>
                @endif

                <hr>

                <b>Calendriers</b>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" checked id="calendarBookings">
                    <label class="form-check-label" for="calendarBookings">
                        Programmation
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" checked id="calendarBookingsUnvalidated">
                    <label class="form-check-label" for="calendarBookingsUnvalidated">
                        Programmation - En attente de validation
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" checked id="calendarActivities">
                    <label class="form-check-label" for="calendarActivities">
                        Activité
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" checked id="calendarActivitiesUnvalidated">
                    <label class="form-check-label" for="calendarActivitiesUnvalidated">
                        Activité - En attente de vaildation
                    </label>
                </div>
            </div>

            <div class="col-lg-10">
                <div id="fullcalendar"></div>
            </div>
        </div>
    </div>
@endsection
