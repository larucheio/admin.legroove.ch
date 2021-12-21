@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <h1 class="h6 mb-3">Créer un compte</h1>

        <form action="{{ route('users.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Identifiant *</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rôle</label>
                <select id="role" name="role" class="form-select" aria-label="Rôle">
                    <option value="" selected>Aucun</option>
                    <option value="admin">Admin</option>
                    <option value="pr">Communication</option>
                    <option value="team">Programmation/Équipe</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="referent" class="form-label">Personne référente *</label>
                <input type="text" class="form-control" id="referent" name="referent" required>
            </div>

            <div class="mb-3">
                <label for="referent_phone" class="form-label">Personne référente - Téléphone</label>
                <input type="text" class="form-control" id="referent_phone" name="referent_phone">
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection
