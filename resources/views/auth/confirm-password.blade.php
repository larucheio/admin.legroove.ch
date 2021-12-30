@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="h6 mb-3">Confirmer le mot de passe pour continuer</h1>

        @include('includes.errors')

        <form action="/user/confirm-password" method="post">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe *</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Confirmer</button>
        </form>
    </div>
@endsection
