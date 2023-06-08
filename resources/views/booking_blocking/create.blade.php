@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h6 mb-3">Ajouter une période bloquée</h1>

        <form action="{{ route('booking_blocking.store') }}" method="post" class="row g-3">
            @csrf

            <div class="col-md-6">
                <label for="type_to_block" class="form-label">Bloquer *</label>
                <select class="form-select" id="type_to_block" name="type_to_block" required>
                    <option value="activity,booking" selected>Activité & Programmation</option>
                    <option value="activity">Activité</option>
                    <option value="booking">Programmation</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="cause" class="form-label">Raison du blocage</label>
                <input type="text" class="form-control" id="cause" name="cause">
            </div>

            <div class="col-md-6">
                <label for="from" class="form-label">De *</label>
                <input type="date" class="form-control" id="from" name="from" required>
            </div>

            <div class="col-md-6">
                <label for="to" class="form-label">À *</label>
                <input type="date" class="form-control" id="to" name="to" required>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-primary">Créer</button>
                <a href="{{ route('spaces.index') }}" class="btn btn-link">Annuler</a>
            </div>
        </form>
    </div>

    @include('includes.flatpickr', ['element' => '#from'])
    @include('includes.flatpickr', ['element' => '#to'])
@endsection
