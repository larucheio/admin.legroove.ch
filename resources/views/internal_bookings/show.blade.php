@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <h1 class="h6 mb-3">{{ $internalBooking->title }} - Réservation interne</h1>

        <p>
            {{ $internalBooking->date->isoFormat('LL') }}
            <br>
            Horaires: {{ $internalBooking->opening_hours }}
        </p>

        <p class="mb-0">
            <b>Espaces</b>
        </p>
        <ul>
            @foreach ($internalBooking->spaces as $space)
                <li>{{ $space->name }}</li>
            @endforeach
        </ul>

        <p>
            <b>Contact</b>
            <br>
            {!! nl2br(e($internalBooking->contact)) !!}
        </p>

        @canany(['update', 'delete'], $internalBooking)
            <hr>
            @can('update', $internalBooking)
                <a href="{{ route('internal_bookings.edit', $internalBooking) }}" class="btn btn-primary btn-sm">Modifier</a>
            @endcan
            @can('delete', $internalBooking)
                <form action="{{ route('internal_bookings.destroy', $internalBooking) }}" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            @endcan
        @endcanany
    </div>
@endsection
