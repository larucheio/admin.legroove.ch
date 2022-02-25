@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="h6 mb-3">Nouvelle réservation - Activité</h1>

        <form action="{{ route('activities.store') }}" method="post">
            @csrf

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
                    <label for="spaces" class="form-label">Espace(s) * (sélection multiple possible)</label>
                    <select id="spaces" name="spaces[]" class="form-select" required multiple>
                        @foreach ($spaces as $space)
                            <option value="{{ $space->id }}">{{ $space->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="contact" class="form-label">Contact *</label>
                    <textarea class="form-control" id="contact" rows="5" name="contact" required></textarea>
                </div>

                <div class="col-12">
                    <label for="complementary_informations" class="form-label">Informations complémentaires</label>
                    <textarea class="form-control" id="complementary_informations" rows="5" name="complementary_informations"></textarea>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Créer</button>
                    <a href="{{ url()->previous() }}" class="btn btn-link">Annuler</a>
                </div>
            </div>
        </form>
    </div>

    @include('includes.flatpickr', ['element' => '#start', 'time' => true, 'bookingLimitations' => $bookingLimitations])
    @include('includes.flatpickr', ['element' => '#end', 'time' => true, 'bookingLimitations' => $bookingLimitations])
@endsection
