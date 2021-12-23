@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <h1 class="h6 mb-3">Créer un compte</h1>

        <form action="{{ route('accounts.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="identifier" class="form-label">Identifiant *</label>
                <input type="text" class="form-control" id="identifier" name="identifier" required>
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
                <label for="contact" class="form-label">Contact *</label>
                <textarea class="form-control" id="contact" rows="5" name="contact" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('accounts.index') }}" class="btn btn-link">Annuler</a>
        </form>
    </div>
@endsection
