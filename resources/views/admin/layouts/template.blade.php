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
                <a href="{{ route('operations.index') }}">Toutes les opérations</a>
                <a href="{{ route('subscriptions.index') }}">Tous les abonnements</a>
                <a href="{{ route('usertypes.index') }}">Tous les types utilisateurs</a>
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