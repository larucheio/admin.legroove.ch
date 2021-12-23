@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <h1 class="h6 mb-3">{{ $booking->title }} - Réservation publique</h1>

        <p>
            {{ $booking->account->identifier }}
        </p>

        <p>
            {{ $booking->date->isoFormat('LL') }}
            <br>
            Horaires: {{ $booking->opening_hours }}
            <br>
            Prix d'entrée: {{ $booking->entry_price }}
            <br>
            Style: {{ $booking->style }}
        </p>

        <p>
            <b>Description</b>
            <br>
            {!! nl2br(e($booking->description)) !!}
        </p>

        <p>
            <b>Informations privées</b>
            <br>
            Affluence estimée: {{ $booking->estimated_attendance }}
            <br>
            Type: {{ $booking->type }}
        </p>

        <p>
            <b>Contact</b>
            <br>
            {!! nl2br(e($booking->contact)) !!}
        </p>

        @canany(['update', 'delete'], $booking)
            <hr>
            @can('update', $booking)
                <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-primary btn-sm">Modifier</a>
            @endcan
            @can('delete', $booking)
                <form action="{{ route('bookings.destroy', $booking) }}" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            @endcan
        @endcanany
    </div>
@endsection
