<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de VOD - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('dashboard/img/ntechnica-square-favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <section id="loginPage">
        <div class="container">
            <div class="block">
                <div class="head-block">
                    <div class="branding">
                        <img src="{{ asset('dashboard/img/ntechnica-square-favicon.png') }}" alt="">
                    </div>
                </div>
                <h1>VODAPP - Gestion de VOD</h1>
                <div class="body-block">
                    <form action="" method="post" class="">
                        <label for="">Username
                            <input type="text" name="" id="">
                        </label>
                        <label for="">Password
                            <input type="password" name="" id="">
                        </label>
                        <label for="">
                            <input type="submit" value="Login" class="btn btn-info">
                        </label>
                    </form>
                </div>
                <div class="foot-block">
                    <p>@VOD-Management-App -- 2024</p>
                </div>
            </div>
        </div>
    </section>
    <footer>

        @stack('scripts')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>