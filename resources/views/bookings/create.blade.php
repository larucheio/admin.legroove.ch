@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <h1 class="h6 mb-3">Nouvelle réservation publique</h1>

        <form action="{{ route('bookings.store') }}" method="post">
            @csrf

            <p><b>Informations publiques</b></p>
            <div class="mb-3">
                <label for="title" class="form-label">Titre *</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date *</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="5" name="description"></textarea>
            </div>

            <div class="mb-3">
                <label for="opening_hours" class="form-label">Horaires</label>
                <input type="text" class="form-control" id="opening_hours" name="opening_hours">
            </div>

            <div class="mb-3">
                <label for="links" class="form-label">Liens *</label>
                <textarea class="form-control" id="links" rows="5" name="links"></textarea>
            </div>

            <div class="mb-3">
                <label for="entry_price" class="form-label">Prix d'entrée</label>
                <input type="text" class="form-control" id="entry_price" name="entry_price">
            </div>

            <div class="mb-3">
                <label for="style" class="form-label">Style</label>
                <input type="text" class="form-control" id="style" name="style">
            </div>

            <hr class="my-5">
            <p><b>Informations privées</b></p>

            <div class="mb-3">
                <label for="estimated_attendance" class="form-label">Affluence estimée *</label>
                <input type="text" class="form-control" id="estimated_attendance" name="estimated_attendance" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type *</label>
                <input type="text" class="form-control" id="type" name="type" required>
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact *</label>
                <textarea class="form-control" id="contact" rows="5" name="contact" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('bookings.index') }}" class="btn btn-link">Annuler</a>
        </form>
    </div>
@endsection
