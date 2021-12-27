@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h6 mb-3">Modifier un espace</h1>

        <form action="{{ route('spaces.update', $space) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name" class="form-label">Nom *</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $space->name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="{{ route('spaces.index') }}" class="btn btn-link">Annuler</a>
        </form>
    </div>
@endsection
