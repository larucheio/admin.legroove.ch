<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME', 'Laravel') }}</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <script src="{{ mix('/js/app.js') }}"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/groove.png" alt="" width="50" height="50">
                </a>
                @auth
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarToggler">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Accueil</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            @if (Auth::user()->isPR)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Administration
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdmin">
                                        @if (Auth::user()->isAdmin)
                                            <li>
                                                <a href="{{ route('accounts.index') }}" class="dropdown-item">Comptes</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('spaces.index') }}" class="dropdown-item">Espaces</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('booking_blocking.index') }}" class="dropdown-item">Blocage des réservations</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('settings.index') }}" class="dropdown-item">Paramètres</a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="{{ route('emails.edit') }}" class="dropdown-item">Emails</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            <li class="nav-item">
                                <form class="" action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" name="button" class="btn btn-link nav-link border-0">Se déconnecter</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </nav>

        <div class="mb-5">
            @yield('content')
        </div>
    </body>
</html>
