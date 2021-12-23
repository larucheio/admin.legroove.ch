@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <h1 class="h6 mb-3">Réservations interne</h1>

        <p>
            <a href="{{ route('internal_bookings.create') }}">Nouvelle réservation</a>
        </p>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Horaires</th>
                        <th>Espace(s)</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($internalBookings as $booking)
                        <tr>
                            <td>{{ $booking->title }}</td>
                            <td>{{ $booking->date->isoFormat('LL') }}</td>
                            <td>{{ $booking->opening_hours }}</td>
                            <td>{{ $booking->spaces->implode('name', ', ') }}</td>
                            <td>
                                <a href="{{ route('internal_bookings.show', $booking) }}" class="btn btn-primary btn-sm">Détails</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
