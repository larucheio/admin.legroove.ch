@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h6 mb-3">Modifier une période bloquée</h1>

        <form action="{{ route('booking_blocking.update', $bookingBlocking) }}" method="post" class="row g-3">
            @csrf
            @method('PATCH')

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
@endsection
