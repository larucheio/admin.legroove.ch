@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="h6 mb-3">Modifier la réservation</h1>

        <form action="{{ route('bookings.update', $booking) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <section>
                <h2>Planification</h2>
                <div class="row g-3">
                    @if (!$booking->validated || Auth::user()->isPR)
                        <div class="col-12">
                            <label for="title" class="form-label">Titre *</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $booking->title }}" required>
                        </div>

                        <div class="col-md">
                            <label for="start" class="form-label">Début *</label>
                            <input type="datetime" class="form-control bg-white" id="start" name="start" value="{{ $booking->start }}" required>
                        </div>

                        <div class="col-md">
                            <label for="end" class="form-label">Fin *</label>
                            <input type="datetime" class="form-control bg-white" id="end" name="end" value="{{ $booking->end }}" required>
                        </div>

                        <div class="col-12">
                            <label for="price" class="form-label">Prix d'entrée</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $booking->price }}">
                        </div>
                    @endif

                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="5" name="description">{{ $booking->description }}</textarea>
                    </div>

                    @if (!$booking->validated || Auth::user()->isPR)
                        <div class="col-md">
                            <label for="type" class="form-label">Type *</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{ $booking->type }}" required>
                        </div>

                        <div class="col-md">
                            <label for="organizer" class="form-label">Organisateur *</label>
                            <select class="form-select" id="organizer" required>
                                <option value="collectifnocturne" @if ($booking->organizer === 'collectifnocturne') selected @endif>Collectif Nocturne</option>
                                <option value="corner25" @if ($booking->organizer === 'corner25') selected @endif>Corner 25</option>
                            </select>
                        </div>
                    @endif

                    <div class="col-12">
                        <label for="association_name" class="form-label">Nom de l'association *</label>
                        <input type="text" class="form-control" id="association_name" name="association_name" value="{{ $booking->association_name }}" required>
                    </div>
                </div>
            </section>

            <section class="mt-5">
                <h2>Communication</h2>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="communication_links" class="form-label">Liens</label>
                        <textarea class="form-control" id="communication_links" rows="5" name="communication_links">{{ $booking->communication_links }}</textarea>
                    </div>

                    <div class="col-12">
                        <div>
                            <label for="medias" class="form-label">Ajouter des média(s)</label>
                            <input class="form-control" type="file" id="medias" name="medias[]" multiple>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-5">
                <h2>Technique</h2>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="technical_needs" class="form-label">Besoins techniques</label>
                        <textarea class="form-control" id="technical_needs" rows="5" name="technical_needs">{{ $booking->technical_needs }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="technical_light_contact" class="form-label">Nom(s) technique lumière</label>
                        <textarea class="form-control" id="technical_light_contact" rows="5" name="technical_light_contact">{{ $booking->technical_light_contact }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="technical_sound_contact" class="form-label">Nom(s) technique son</label>
                        <textarea class="form-control" id="technical_sound_contact" rows="5" name="technical_sound_contact">{{ $booking->technical_sound_contact }}</textarea>
                    </div>
                </div>
            </section>

            <section class="mt-5">
                <h2>Accueil / Bar / Encadrement</h2>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="groove_referents" class="form-label">Personne(s) de référence</label>
                        <textarea class="form-control" id="groove_referents" rows="5" name="groove_referents">{{ $booking->groove_referents }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="groove_estimated_attendance" class="form-label">Affluence estimée</label>
                        <input type="text" class="form-control" id="groove_estimated_attendance" name="groove_estimated_attendance" value="{{ $booking->groove_estimated_attendance }}">
                    </div>

                    <div class="col-12">
                        <label for="groove_perm" class="form-label">Nom(s) permanence</label>
                        <textarea class="form-control" id="groove_perm" rows="5" name="groove_perm">{{ $booking->groove_perm }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="groove_accueil_artiste" class="form-label">Nom(s) accueil artiste</label>
                        <textarea class="form-control" id="groove_accueil_artiste" rows="5" name="groove_accueil_artiste">{{ $booking->groove_accueil_artiste }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="groove_bar" class="form-label">Nom(s) responsable bar</label>
                        <textarea class="form-control" id="groove_bar" rows="5" name="groove_bar">{{ $booking->groove_bar }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="groove_accueil" class="form-label">Nom(s) responsable accueil</label>
                        <textarea class="form-control" id="groove_accueil" rows="5" name="groove_accueil">{{ $booking->groove_accueil }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="groove_benevoles_bar" class="form-label">Bénévoles bar</label>
                        <textarea class="form-control" id="groove_benevoles_bar" rows="5" name="groove_benevoles_bar">{{ $booking->groove_benevoles_bar }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="groove_benevoles_vestiaires" class="form-label">Bénévoles vestiaires</label>
                        <textarea class="form-control" id="groove_benevoles_vestiaires" rows="5" name="groove_benevoles_vestiaires">{{ $booking->groove_benevoles_vestiaires }}</textarea>
                    </div>
                </div>
            </section>

            <div class="mt-5">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{ route('activities.show', $booking) }}" class="btn btn-link">Annuler</a>
            </div>
        </form>

        @include('includes.flatpickr', ['element' => '#start', 'time' => true, 'bookingLimitations' => $bookingLimitationsStart])
        @include('includes.flatpickr', ['element' => '#end', 'time' => true, 'bookingLimitations' => $bookingLimitationsEnd])
    </div>
@endsection
