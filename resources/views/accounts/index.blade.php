@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h6 mb-3">Comptes</h1>

        <p>
            <a href="{{ route('accounts.create') }}">Créer un compte</a>
        </p>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Identifiant</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Contact</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                        <tr>
                            <td>{{ $account->identifier }}</td>
                            <td>{{ $account->email }}</td>
                            <td>{{ $account->roleDisplay }}</td>
                            <td>{{ $account->contact }}</td>
                            <td>
                                <a href="{{ route('accounts.edit', $account) }}" class="btn btn-primary btn-sm">Modifier</a>

                                <form class="d-inline-block" action="{{ route('accounts.destroy', $account) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
