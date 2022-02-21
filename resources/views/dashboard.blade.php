@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        @if (Auth::user()->isAdmin)
            <section>
                <h1 class="h6 lead">En attente de validation</h1>
                <div class="row g-3">
                    <div class="col-12 col-md">
                        <b>Programmation</b>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Qui?</th>
                                        <th>Titre</th>
                                        <th>Horaires</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings['bookings'] as $booking)
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
                    <div class="col-12 col-md">
                        <b>Activités</b>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Qui?</th>
                                        <th>Titre</th>
                                        <th>Horaires</th>
                                        <th>Espace(s)</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings['activities'] as $booking)
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
                                            <td>{{ $booking->opening_hours }}</td>
                                            <td>{{ $booking->spaces->implode('name', ', ') }}</td>
                                            <td>
                                                <a href="{{ route('activities.show', $booking) }}" class="btn btn-primary btn-sm">Détails</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <section class="mt-5">
            <h1 class="h6 lead">Aujourd'hui</h1>

            <div class="row g3">
                <div class="col-12 col-md-6">
                    <b>Programmation</b>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Qui?</th>
                                    <th>Titre</th>
                                    <th>Horaires</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($today['bookings'] as $booking)
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
                <div class="col-12 col-md-6">
                    <b>Activités</b>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Qui?</th>
                                    <th>Titre</th>
                                    <th>Horaires</th>
                                    <th>Espace(s)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($today['activities'] as $booking)
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
                                        <td>{{ $booking->opening_hours }}</td>
                                        <td>{{ $booking->spaces->implode('name', ', ') }}</td>
                                        <td>
                                            <a href="{{ route('activities.show', $booking) }}" class="btn btn-primary btn-sm">Détails</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
