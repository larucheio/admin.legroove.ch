@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <section>
            <h1 class="h6 lead">Périodes de réservation</h1>

            <form action="{{ route('settings.update') }}" method="post" class="row g-3">
                @csrf

                <b>Programmation</b>
                <div class="col-md-6">
                    <label for="booking_dateplus_min" class="form-label">Peut faire une réservation dès t+n jours</label>
                    <input type="number" class="form-control" id="booking_dateplus_min" name="booking_dateplus_min" value="{{ $settings ? $settings->booking_dateplus_min : null }}" required>
                </div>
                <div class="col-md-6">
                    <label for="booking_dateplus_to" class="form-label">Jusqu'à t+n jours</label>
                    <input type="number" class="form-control" id="booking_dateplus_to" name="booking_dateplus_to" value="{{ $settings ? $settings->booking_dateplus_to : null }}" required>
                </div>

                <b>Activités</b>
                <div class="col-md-6">
                    <label for="activity_dateplus_from" class="form-label">Peut faire une réservation dès t+n jours</label>
                    <input type="number" class="form-control" id="activity_dateplus_from" name="activity_dateplus_from" value="{{ $settings ? $settings->activity_dateplus_from : null }}" required>
                </div>
                <div class="col-md-6">
                    <label for="activity_dateplus_to" class="form-label">Jusqu'à t+n jours</label>
                    <input type="number" class="form-control" id="activity_dateplus_to" name="activity_dateplus_to" value="{{ $settings ? $settings->activity_dateplus_to : null }}" required>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </div>
            </form>
        </section>
    </div>
@endsection
