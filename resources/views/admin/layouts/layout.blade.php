<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de VOD - {{ $title }}</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('operations.index') }}">Toutes les opérations</a>
                </li>
                <li>
                    <a href="{{ route('status.index') }}">Tous les abonnements</a>
                </li>
                <li>
                    <a href="{{ route('usertypes.index') }}">Tous les types utilisateurs</a>
                </li>
                <li>
                    <a href="{{ route('subscriptions.index') }}">Les abonnements</a>
                </li>
                <li>
                    <a href="{{ route('movies.index') }}">Toutes les vidéos</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @VOD-Management-App
        @stack('scripts')
    </footer>
</body>

</html>