
@extends('layouts.default')

@section('header_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/theme.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

@endsection
@section('content')

    <div id="dashboard">
        <header>
            <h3>Events</h3>
        </header>

        <div class="p-5">

            <div class="row">
                <div class="col-md-2">
                    <a href="{{ route('events-create') }}" class="btn btn-primary d-inline mt-5">New Event</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="form">
                        <input type="text" name="search" id="myInput" placeholder="Search..." class="form-control">
                    </div>
                </div>
            </div>

            @if( $msg = Session::get('success'))
                <div class="alert alert-success mt-3 mb-3">{{ $msg }}</div>
            @endif
            <table id="myTable" class="table table-striped mt-4">
                <thead>
                <tr>
                    <th width="20%"><input type="checkbox" class="mr-2"> Name</th>
                    <th>Points</th>
                    <th>Time Start</th>
                    <th>Time End</th>
                    <th>Location</th>
                    <th>Details</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-md-1">
                                    <input type="checkbox"/>
                                </div>
                                <div class="col-md-9">
                                    <div class="site-name">
                                        {{ $event->name }}
                                    </div>
                                    <small>
                                        <a href="{{ route('events-points', ["id" => $event->id]) }}" class="text-secondary text-decoration-none"><i class="bi bi-gift"></i> Give Points</a> |
                                        <a href="{{ route('events-edit', ["id" => $event->id]) }}" class="text-blue-600 text-decoration-none"><i class="bi bi-pencil"></i> Edit</a> |
                                        <a href="{{ route('events-remove', ["id" => $event->id]) }}" class="text-danger text-decoration-none"><i class="bi bi-trash"></i> Delete</a>
                                    </small>
                                </div>
                            </div>

                            <div class="clear clear-fix"></div>
                        </td>
                        <td>{{ $event->points }}</td>
                        <td> {{ $event->timestart }}</td>
                        <td> {{ $event->timeend }}</td>
                        <td>
                            {{ $event->address }}
                        </td>
                        <td>{{ $event->details }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>


    </div>

@endsection
