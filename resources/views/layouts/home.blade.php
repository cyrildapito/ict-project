<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blood Donation</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="home-page">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 left">

            </div>
            <div class="col-md-4 position-relative">

                <div class="mt-5 mb-5">&nbsp;</div>
                <h1 class="text-center">Blood Donation Program</h1>
                <span class="text-center d-block">Help save lives!!!</span>

                <div class="mt-5 mb-5">&nbsp;</div>

                @yield('content')

                <div class="copyright position-absolute bottom-0 m-0 p-0" style="width: 95%;">
                    <p class="w-full text-center small">Copyright &copy; Blood Donation Program. All Rights Reserved 2023</p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
