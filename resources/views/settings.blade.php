@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <section>
            <h1 class="h6 lead">Périodes de réservation</h1>

            <form action="{{ route('settings.update') }}" method="post" class="row g-3">
                @csrf

                <b>Programmation</b>
                <div class="col-md-6">
                    <label for="publicReservationFrom" class="form-label">Peut faire une réservation dès t+n jours</label>
                    <input type="number" class="form-control" id="publicReservationFrom" name="public_reservation_from" value="{{ $settings ? $settings->public_reservation_from : null }}" required>
                </div>
                <div class="col-md-6">
                    <label for="publicReservationTo" class="form-label">Jusqu'à t+n jours</label>
                    <input type="number" class="form-control" id="publicReservationTo" name="public_reservation_to" value="{{ $settings ? $settings->public_reservation_to : null }}" required>
                </div>

                <b>Activités</b>
                <div class="col-md-6">
                    <label for="internalReservationFrom" class="form-label">Peut faire une réservation dès t+n jours</label>
                    <input type="number" class="form-control" id="internalReservationFrom" name="internal_reservation_from" value="{{ $settings ? $settings->internal_reservation_from : null }}" required>
                </div>
                <div class="col-md-6">
                    <label for="internalReservationTo" class="form-label">Jusqu'à t+n jours</label>
                    <input type="number" class="form-control" id="internalReservationTo" name="internal_reservation_to" value="{{ $settings ? $settings->internal_reservation_to : null }}" required>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </div>
            </form>
        </section>
    </div>
@endsection
