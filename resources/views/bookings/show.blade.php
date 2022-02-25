@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h6 mb-3">
            {{ $booking->title }} - Réservation publique
            @if (!$booking->validated)
                <span class="badge bg-warning text-dark">Non validé</span>
            @endif
        </h1>

        <p>
            @if ($booking->account)
                {{ $booking->account->identifier }}
            @else
                <i class="text-muted">Compte supprimé</i>
            @endif
        </p>

        <section>
            <h2>Planification</h2>
            <p>
                {{ $booking->date }}
                <br>
                Prix d'entrée: {{ $booking->price }}
                <br>
                Type: {{ $booking->type }}
                <br>
                Organisateur: {{ $booking->organizerDisplay }}
                <br>
                Nom de l'association: {{ $booking->association_name }}
            </p>
            <p>
                <b>Description</b>
                <br>
                {!! nl2br(e($booking->description)) !!}
            </p>
        </section>

        <section class="mt-5">
            <h2>Communication</h2>
            <div class="row">
                <div class="col-md">
                    <p>
                        Liens:
                        @if ($booking->communication_links)
                            <br>
                            {{ $booking->communication_links }}
                        @endif
                    </p>
                </div>
                <div class="col-md">
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
                </div>
            </div>
        </section>

        <section class="mt-5">
            <h2>Technique</h2>
            @if ($booking->technical_needs)
                <p>
                    Besoins techniques
                    <br>
                    {{ $booking->technical_needs }}
                </p>
            @endif
            @if ($booking->technical_light_contact)
                <p>
                    Nom(s) technique lumière
                    <br>
                    {{ $booking->technical_light_contact }}
                </p>
            @endif
            @if ($booking->technical_sound_contact)
                <p>
                    Nom(s) technique son
                    <br>
                    {{ $booking->technical_sound_contact }}
                </p>
            @endif
        </section>

        <section class="mt-5">
            <h2>Accueil / Bar / Encadrement</h2>
            @if ($booking->groove_referents)
                <p>
                    Personne(s) de référence
                    <br>
                    {{ $booking->groove_referents }}
                </p>
            @endif
            @if ($booking->groove_estimated_attendance)
                <p>
                    Affluence estimée
                    <br>
                    {{ $booking->groove_estimated_attendance }}
                </p>
            @endif
            @if ($booking->groove_perm)
                <p>
                    Nom(s) permanence
                    <br>
                    {{ $booking->groove_perm }}
                </p>
            @endif
            @if ($booking->groove_accueil_artiste)
                <p>
                    Nom(s) accueil artiste
                    <br>
                    {{ $booking->groove_accueil_artiste }}
                </p>
            @endif
            @if ($booking->groove_bar)
                <p>
                    Nom(s) responsable bar
                    <br>
                    {{ $booking->groove_bar }}
                </p>
            @endif
            @if ($booking->groove_accueil)
                <p>
                    Nom(s) responsable accueil
                    <br>
                    {{ $booking->groove_accueil }}
                </p>
            @endif
            @if ($booking->groove_benevoles_bar)
                <p>
                    Bénévoles bar
                    <br>
                    {{ $booking->groove_benevoles_bar }}
                </p>
            @endif
            @if ($booking->groove_benevoles_vestiaires)
                <p>
                    Bénévoles vestiaires
                    <br>
                    {{ $booking->groove_benevoles_vestiaires }}
                </p>
            @endif
        </section>

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
