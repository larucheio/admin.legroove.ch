@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <h1 class="h6 mb-3">Utilisateurices</h1>

        <p>
            <a href="{{ route('users.create') }}">Créer un compte</a>
        </p>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Identifiant</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Personne référente</th>
                        <th>Téléphone</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roleDisplay }}</td>
                            <td>{{ $user->referent }}</td>
                            <td>{{ $user->referent_phone }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-sm">Modifier</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
