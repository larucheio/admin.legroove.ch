@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h6 mb-3">
            {{ $activity->title }} - Activité
            @if (!$activity->validated)
                <span class="badge bg-warning text-dark">Non validé</span>
            @endif
        </h1>

        <p>
            @if ($activity->account)
                {{ $activity->account->identifier }}
            @else
                <i class="text-muted">Compte supprimé</i>
            @endif
        </p>

        <p>
            {{ $activity->date }}
        </p>

        <p class="mb-0">
            <b>Espace(s)</b>
        </p>
        <ul>
            @foreach ($activity->spaces as $space)
                <li>{{ $space->name }}</li>
            @endforeach
        </ul>

        <p>
            <b>Contact</b>
            <br>
            {!! nl2br(e($activity->contact)) !!}
        </p>

        <p>
            <b>Informations complémentaires</b>
            <br>
            {!! nl2br(e($activity->complementary_informations)) !!}
        </p>

        @canany(['validateBooking', 'invalidateBooking', 'update', 'delete'], $activity)
            <hr>
            @can('validateBooking', $activity)
                <a href="{{ route('activities.validate', $activity) }}" class="btn btn-success btn-sm">Valider</a>
            @endcan
            @can('invalidateBooking', $activity)
                <a href="{{ route('activities.invalidate', $activity) }}" class="btn btn-warning btn-sm">Invalider</a>
            @endcan
            @can('update', $activity)
                <a href="{{ route('activities.edit', $activity) }}" class="btn btn-primary btn-sm">Modifier</a>
            @endcan
            @can('delete', $activity)
                <form action="{{ route('activities.destroy', $activity) }}" method="post" class="d-inline-block">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            @endcan
        @endcanany
    </div>
@endsection
