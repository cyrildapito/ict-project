@extends('layouts.default')

@section('header_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/theme.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

    <script>
        window.$ = jQuery;
    </script>

    <style>

    </style>
@endsection
@section('content')

    <div>
        <header>
            <h3>History</h3>
        </header>

        <div class="p-3 m-t-5">

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Location</th>
                        <th>Points Received</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($user->profile->history as $history)
                        <tr>
                            <td>{{ $history->name }}</td>
                            <td>{{ $history->address }}</td>
                            <td>{{ $history->points }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>


    </div>

@endsection
