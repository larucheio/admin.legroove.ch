@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h6 mb-3">Modifier la réservation</h1>

        <form action="{{ route('bookings.update', $booking) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="title" class="form-label">Titre *</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $booking->title }}" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date *</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $booking->date->isoFormat('YYYY-MM-DD') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="5" name="description">{{ $booking->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="opening_hours" class="form-label">Horaires</label>
                <input type="text" class="form-control" id="opening_hours" name="opening_hours" value="{{ $booking->opening_hours }}">
            </div>

            <div class="mb-3">
                <label for="links" class="form-label">Liens</label>
                <textarea class="form-control" id="links" rows="5" name="links">{{ $booking->links }}</textarea>
            </div>

            <div class="mb-3">
                <label for="entry_price" class="form-label">Prix d'entrée</label>
                <input type="text" class="form-control" id="entry_price" name="entry_price" value="{{ $booking->entry_price }}">
            </div>

            <div class="mb-3">
                <label for="style" class="form-label">Style</label>
                <input type="text" class="form-control" id="style" name="style" value="{{ $booking->style }}">
            </div>

            <div class="mb-3">
                <label for="medias" class="form-label">Ajouter des média(s)</label>
                <input class="form-control" type="file" id="medias" name="medias[]" multiple>
            </div>

            <hr class="my-5">
            <p><b>Informations privées</b></p>

            <div class="mb-3">
                <label for="estimated_attendance" class="form-label">Affluence estimée *</label>
                <input type="text" class="form-control" id="estimated_attendance" name="estimated_attendance" value="{{ $booking->estimated_attendance }}" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type *</label>
                <input type="text" class="form-control" id="type" name="type" value="{{ $booking->type }}" required>
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact *</label>
                <textarea class="form-control" id="contact" rows="5" name="contact" required>{{ $booking->contact }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="{{ route('internal_bookings.show', $booking) }}" class="btn btn-link">Annuler</a>
        </form>

        @include('includes.flatpickr', ['element' => '#date', 'bookingLimitations' => $bookingLimitations])
    </div>
@endsection
