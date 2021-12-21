@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <h1 class="h6 mb-3">Créer un espace</h1>

        <form action="{{ route('spaces.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nom *</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('spaces.index') }}" class="btn btn-link">Annuler</a>
        </form>
    </div>
@endsection
