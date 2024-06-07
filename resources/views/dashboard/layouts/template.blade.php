<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de VOD - {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dashboard/css/vod-admin.css') }}">
</head>

<body>
    <!-- Page wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <aside>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('operations.index') }}" class="list-group-item-link">Opérations</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('usertypes.index') }}" class="list-group-item-link">Usertypes</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('status.index') }}" class="list-group-item-link">Status</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('movies.index') }}" class="list-group-item-link">Movies</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('subscriptions.index') }}" class="list-group-item-link">Subscriptions</a>
                </li>
            </ul>
        </aside>
        <!-- end sidebar -->
        <!-- Page content -->
        <main>
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
        <!-- End page content -->
    </div>
    <!-- end page wrapper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>