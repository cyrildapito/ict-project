<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blood Donation Program - </title>

    @yield('header_scripts')


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <div id="app" class="container-fluid">
        <div class="row">
            <aside class="col-md-2">

                <div class="mt-5 spacer"></div>

                <h1>Blood Donation Program</h1>

                <nav id="menu">
                    <ul>
                        @if($user->hasRole('ROLE_ADMIN'))
                            <li><a href="{{ url('/admin/dashboard') }}"><i class="bi bi-house-dash-fill"></i> Dashboard</a></li>
                            <li><a href="{{ url('/admin/events') }}"><i class="bi bi-map"></i> Events</a></li>
                            <li><a href="{{ url('/admin/donors') }}"><i class="bi bi-person"></i> Donors</a></li>
                            <li><a href="{{ url('/admin/rewards') }}"><i class="bi bi-currency-dollar"></i> Rewards</a></li>
                        @else
                            <li><a href="{{ url('/dashboard') }}"><i class="bi bi-house-dash-fill"></i> Dashboard</a></li>
                            <li><a href="{{ url('/profile') }}"><i class="bi bi-person-badge"></i> Profile</a></li>
                            <li><a href="{{ route('claim-rewards')}}"><i class="bi bi-gift"></i> Rewards</a></li>
                            <li><a href="{{ route('history') }}"><i class="bi bi-clock-history"></i> History</a></li>
                        @endif
                        <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                    </ul>
                </nav>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </aside>
            <section class="col-md-10">
                @yield('content')
            </section>
        </div>
    </div>
</body>
</html>