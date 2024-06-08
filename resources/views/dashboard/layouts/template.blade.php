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
        <aside class="col-md-2 bg-vod-warning">
            <div class="branding">
                <img src="{{ asset('dashboard/img/ntechnica-square-favicon.png') }}" alt="">
            </div>
            <ul class="list-group">
                <hr class="list-group-divider">
                <li class="list-group-item">
                    <a href="{{ route('dashboard') }}" class="list-group-item-link">Dashboard</a>
                </li>
                <hr class="list-group-divider">
                <div class="list-group-header">Opérations</div>
                <li class="list-group-item">
                    <a href="{{ route('operations.index') }}" class="list-group-item-link">Opérations</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('status.index') }}" class="list-group-item-link">Status</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('subscriptions.index') }}" class="list-group-item-link">Subscriptions</a>
                </li>
                <hr class="list-group-divider">
                <div class="list-group-header">Users</div>
                <li class="list-group-item">
                    <a href="{{ route('usertypes.index') }}" class="list-group-item-link">Usertypes</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('users.index') }}" class="list-group-item-link">Users</a>
                </li>
                <hr class="list-group-divider">
                <div class="list-group-header">Movies</div>
                <li class="list-group-item">
                    <a href="{{ route('movies.index') }}" class="list-group-item-link">Movies</a>
                </li>

            </ul>
        </aside>
        <!-- end sidebar -->
        <!-- Page content -->
        <main class="col-md-10">
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