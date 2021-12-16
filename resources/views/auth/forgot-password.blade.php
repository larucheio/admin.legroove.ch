@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="h6 mb-3">Mot de passe oublié/Modifier mon mot de passe</h1>

        @include('includes.errors')
        @include('includes.status')

        <form action="/forgot-password" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
@endsection
