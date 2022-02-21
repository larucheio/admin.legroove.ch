@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h6 mb-3">Nouvelle activité</h1>

        <form action="{{ route('internal_bookings.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titre *</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date *</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="mb-3">
                <label for="opening_hours" class="form-label">Horaires</label>
                <input type="text" class="form-control" id="opening_hours" name="opening_hours">
            </div>

            <div class="mb-3">
                <label for="spaces" class="form-label">Espace(s) * (sélection multiple possible)</label>
                <select id="spaces" name="spaces[]" class="form-select" required multiple>
                    @foreach ($spaces as $space)
                        <option value="{{ $space->id }}">{{ $space->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact *</label>
                <textarea class="form-control" id="contact" rows="5" name="contact" required></textarea>
            </div>

            <div class="mb-3">
                <label for="complementary_informations" class="form-label">Informations complémentaires</label>
                <textarea class="form-control" id="complementary_informations" rows="5" name="complementary_informations"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('internal_bookings.index') }}" class="btn btn-link">Annuler</a>
        </form>
    </div>

    @include('includes.flatpickr', ['element' => '#date', 'bookingLimitations' => $bookingLimitations])
@endsection
