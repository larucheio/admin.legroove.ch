@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h6 mb-3">
            {{ $internalBooking->title }} - Réservation interne
            @if (!$internalBooking->validated)
                <span class="badge bg-warning text-dark">Non validé</span>
            @endif
        </h1>

        <p>
            @if ($internalBooking->account)
                {{ $internalBooking->account->identifier }}
            @else
                <i class="text-muted">Compte supprimé</i>
            @endif
        </p>

        <p>
            {{ $internalBooking->date->isoFormat('LL') }}
            <br>
            Horaires: {{ $internalBooking->opening_hours }}
        </p>

        <p class="mb-0">
            <b>Espace(s)</b>
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

        <p>
            <b>Informations complémentaires</b>
            <br>
            {!! nl2br(e($internalBooking->complementary_informations)) !!}
        </p>

        @canany(['validateBooking', 'invalidateBooking', 'update', 'delete'], $internalBooking)
            <hr>
            @can('validateBooking', $internalBooking)
                <a href="{{ route('internal_bookings.validate', $internalBooking) }}" class="btn btn-success btn-sm">Valider</a>
            @endcan
            @can('invalidateBooking', $internalBooking)
                <a href="{{ route('internal_bookings.invalidate', $internalBooking) }}" class="btn btn-warning btn-sm">Invalider</a>
            @endcan
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
