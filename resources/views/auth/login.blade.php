@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="h6 mb-3">Se connecter</h1>

        @include('includes.errors')
        @include('includes.status')

        <form action="/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe *</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Rester connecté·x·e</label>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>

            <a href="{{ url('/forgot-password') }}" class="d-block mt-3">Mot de passe oublié/Modifier mon mot de passe</a>
        </form>
    </div>
@endsection
