@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h6 mb-3">Espaces</h1>

        <p>
            <a href="{{ route('spaces.create') }}">Créer un espace</a>
        </p>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spaces as $space)
                        <tr>
                            <td>{{ $space->name }}</td>
                            <td>
                                <a href="{{ route('spaces.edit', $space) }}" class="btn btn-primary btn-sm">Modifier</a>

                                <form class="d-inline-block" action="{{ route('spaces.destroy', $space) }}" method="post">
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
