@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h6 mb-3">Blocage des réservations</h1>

        <p>
            <a href="{{ route('booking_blocking.create') }}">Ajouter une période bloquée</a>
        </p>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Type de réservation bloquée</th>
                        <th>De</th>
                        <th>À</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookingBlockings as $blocking)
                        <tr>
                            <td>{{ $blocking->typeToBlockDisplay }}</td>
                            <td>{{ $blocking->from->isoFormat('LL') }}</td>
                            <td>{{ $blocking->to->isoFormat('LL') }}</td>
                            <td>
                                <a href="{{ route('booking_blocking.edit', $blocking) }}" class="btn btn-primary btn-sm">Modifier</a>

                                <form class="d-inline-block" action="{{ route('booking_blocking.destroy', $blocking) }}" method="post">
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
