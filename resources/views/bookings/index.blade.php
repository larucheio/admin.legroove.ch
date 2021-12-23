@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <h1 class="h6 mb-3">Réservations publique</h1>

        <p>
            <a href="{{ route('bookings.create') }}">Nouvelle réservation</a>
        </p>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Qui?</th>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Horaires</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>
                                @if ($booking->account)
                                    {{ $booking->account->identifier }}
                                @else
                                    <i class="text-muted">Compte supprimé</i>
                                @endif
                            </td>
                            <td>
                                {{ $booking->title }}
                                @if (!$booking->validated)
                                    <span class="badge bg-warning text-dark">Non validé</span>
                                @endif
                            </td>
                            <td>{{ $booking->date->isoFormat('LL') }}</td>
                            <td>{{ $booking->opening_hours }}</td>
                            <td>
                                <a href="{{ route('bookings.show', $booking) }}" class="btn btn-primary btn-sm">Détails</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
