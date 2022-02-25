@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="h6 mb-3">Nouvelle réservation - Programmation</h1>

        <form action="{{ route('bookings.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <section>
                <h2>Planification</h2>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="title" class="form-label">Titre *</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="col-md">
                        <label for="start" class="form-label">Début *</label>
                        <input type="datetime" class="form-control bg-white" id="start" name="start" required>
                    </div>

                    <div class="col-md">
                        <label for="end" class="form-label">Fin *</label>
                        <input type="datetime" class="form-control bg-white" id="end" name="end" required>
                    </div>

                    <div class="col-12">
                        <label for="price" class="form-label">Prix d'entrée</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="5" name="description"></textarea>
                    </div>

                    <div class="col-md">
                        <label for="type" class="form-label">Type *</label>
                        <input type="text" class="form-control" id="type" name="type" required>
                    </div>

                    <div class="col-md">
                        <label for="organizer" class="form-label">Organisateur *</label>
                        <select class="form-select" id="organizer" required>
                            <option selected></option>
                            <option value="collectifnocturne">Collectif Nocturne</option>
                            <option value="corner25">Corner 25</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="association_name" class="form-label">Nom de l'association *</label>
                        <input type="text" class="form-control" id="association_name" name="association_name">
                    </div>
                </div>
            </section>

            <section class="mt-5">
                <h2>Communication</h2>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="communication_links" class="form-label">Liens</label>
                        <textarea class="form-control" id="communication_links" rows="5" name="communication_links"></textarea>
                    </div>
                </div>
            </section>

            <section class="mt-5">
                <h2>Technique</h2>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="technical_needs" class="form-label">Besoins techniques</label>
                        <textarea class="form-control" id="technical_needs" rows="5" name="technical_needs"></textarea>
                    </div>

                    <div class="col-12">
                        <label for="technical_light_contact" class="form-label">Nom(s) technique lumière</label>
                        <textarea class="form-control" id="technical_light_contact" rows="5" name="technical_light_contact"></textarea>
                    </div>

                    <div class="col-12">
                        <label for="technical_sound_contact" class="form-label">Nom(s) technique son</label>
                        <textarea class="form-control" id="technical_sound_contact" rows="5" name="technical_sound_contact"></textarea>
                    </div>
                </div>
            </section>

            <section class="mt-5">
                <h2>Accueil / Bar / Encadrement</h2>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="groove_referents" class="form-label">Personne(s) de référence</label>
                        <textarea class="form-control" id="groove_referents" rows="5" name="groove_referents"></textarea>
                    </div>

                    <div class="col-12">
                        <label for="groove_estimated_attendance" class="form-label">Affluence estimée</label>
                        <input type="text" class="form-control" id="groove_estimated_attendance" name="groove_estimated_attendance">
                    </div>

                    <div class="col-12">
                        <label for="groove_perm" class="form-label">Nom(s) permanence</label>
                        <textarea class="form-control" id="groove_perm" rows="5" name="groove_perm"></textarea>
                    </div>

                    <div class="col-12">
                        <label for="groove_accueil_artiste" class="form-label">Nom(s) accueil artiste</label>
                        <textarea class="form-control" id="groove_accueil_artiste" rows="5" name="groove_accueil_artiste"></textarea>
                    </div>

                    <div class="col-12">
                        <label for="groove_bar" class="form-label">Nom(s) responsable bar</label>
                        <textarea class="form-control" id="groove_bar" rows="5" name="groove_bar"></textarea>
                    </div>

                    <div class="col-12">
                        <label for="groove_accueil" class="form-label">Nom(s) responsable accueil</label>
                        <textarea class="form-control" id="groove_accueil" rows="5" name="groove_accueil"></textarea>
                    </div>

                    <div class="col-12">
                        <label for="groove_benevoles_bar" class="form-label">Bénévoles bar</label>
                        <textarea class="form-control" id="groove_benevoles_bar" rows="5" name="groove_benevoles_bar"></textarea>
                    </div>

                    <div class="col-12">
                        <label for="groove_benevoles_vestiaires" class="form-label">Bénévoles vestiaires</label>
                        <textarea class="form-control" id="groove_benevoles_vestiaires" rows="5" name="groove_benevoles_vestiaires"></textarea>
                    </div>
                </div>
            </section>

            <div class="mt-5">
                <button type="submit" class="btn btn-primary">Créer</button>
                <a href="{{ url()->previous() }}" class="btn btn-link">Annuler</a>
            </div>
        </form>
    </div>

    @include('includes.flatpickr', ['element' => '#start', 'time' => true, 'bookingLimitations' => $bookingLimitationsStart])
    @include('includes.flatpickr', ['element' => '#end', 'time' => true, 'bookingLimitations' => $bookingLimitationsEnd])
@endsection
