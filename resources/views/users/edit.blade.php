@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <h1 class="h6 mb-3">Modifier un compte</h1>

        <form action="{{ route('users.update', $user) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="identifier" class="form-label">Identifiant *</label>
                <input type="text" class="form-control" id="identifier" name="identifier" value="{{ $user->identifier }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rôle</label>
                <select id="role" name="role" class="form-select" aria-label="Rôle">
                    <option value="" @if (!$user->role) selected @endif>Aucun</option>
                    <option value="admin" @if ($user->role === 'admin') selected @endif>Admin</option>
                    <option value="pr" @if ($user->role === 'pr') selected @endif>Communication</option>
                    <option value="team" @if ($user->role === 'team') selected @endif>Programmation/Équipe</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Personne de contact *</label>
                <textarea class="form-control" id="contact" rows="5" name="contact" required>{{ $user->contact }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="{{ route('users.index') }}" class="btn btn-link">Annuler</a>
        </form>
    </div>
@endsection
