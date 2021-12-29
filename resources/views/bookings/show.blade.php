@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h6 mb-3">{{ $booking->title }} - Réservation publique</h1>

        <p>
            @if ($booking->account)
                {{ $booking->account->identifier }}
            @else
                <i class="text-muted">Compte supprimé</i>
            @endif
        </p>

        <p>
            {{ $booking->date->isoFormat('LL') }}
            <br>
            Horaires: {{ $booking->opening_hours }}
            <br>
            Prix d'entrée: {{ $booking->entry_price }}
            <br>
            Liens:
            @if ($booking->links)
                <br>
                {{ $booking->links }}
            @endif
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

        <p>
            <b>Média(s)</b>
            <br>
            @foreach ($booking->medias as $key => $bookingMedia)
                <div class="mb-3">
                    <a href="{{ Storage::url($bookingMedia->path) }}" target="_blank" rel="noreferrer">Media {{ $key + 1 }}</a>
                    @can ('delete', $bookingMedia)
                        <form action="{{ route('bookings.medias.destroy', [$booking, $bookingMedia]) }}" method="post" class="d-inline-block ms-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    @endcan
                </div>
            @endforeach
        </p>

        @canany(['validateBooking', 'invalidateBooking', 'update', 'delete'], $booking)
            <hr>
            @can('validateBooking', $booking)
                <a href="{{ route('bookings.validate', $booking) }}" class="btn btn-success btn-sm">Valider</a>
            @endcan
            @can('invalidateBooking', $booking)
                <a href="{{ route('bookings.invalidate', $booking) }}" class="btn btn-warning btn-sm">Invalider</a>
            @endcan
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
