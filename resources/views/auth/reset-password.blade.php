@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="h6 mb-3">Modifier mon mot de passe</h1>

        @include('includes.errors')
        @include('includes.status')

        <form action="/reset-password" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe *</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe *</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <input type="hidden" name="token" value="{{ request()->route('token') }}">
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
@endsection
