@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h6 mb-3">Modifier une période bloquée</h1>

        <form action="{{ route('booking_blocking.update', $bookingBlocking) }}" method="post" class="row g-3">
            @csrf
            @method('PATCH')

            <div class="col-md-6">
                <label for="type_to_block" class="form-label">Bloquer *</label>
                <select class="form-select" id="type_to_block" name="type_to_block" required>
                    <option value="activity,booking" @if ($bookingBlocking->type_to_block === 'activity,booking') selected @endif>Activité & Programmation</option>
                    <option value="activity" @if ($bookingBlocking->type_to_block === 'activity') selected @endif>Activité</option>
                    <option value="booking" @if ($bookingBlocking->type_to_block === 'booking') selected @endif>Programmation</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="cause" class="form-label">Raison du blocage</label>
                <input type="text" class="form-control" id="cause" name="cause" value="{{ $bookingBlocking->cause }}">
            </div>

            <div class="col-md-6">
                <label for="from" class="form-label">De *</label>
                <input type="date" class="form-control" id="from" name="from" value="{{ $bookingBlocking->from->isoFormat('YYYY-MM-DD') }}" required>
            </div>

            <div class="col-md-6">
                <label for="to" class="form-label">À *</label>
                <input type="date" class="form-control" id="to" name="to" value="{{ $bookingBlocking->to->isoFormat('YYYY-MM-DD') }}" required>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{ route('booking_blocking.index') }}" class="btn btn-link">Annuler</a>
            </div>
        </form>
    </div>

    @include('includes.flatpickr', ['element' => '#from'])
    @include('includes.flatpickr', ['element' => '#to'])
@endsection
