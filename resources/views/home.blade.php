@extends('layouts.default')

@section('content')

<div id="dashboard">
    <header>
        <h3>Dashboard</h3>
    </header>

    <div class="p-3">
        <div class="row">
            <div class="col-md-6">

                <h5>Events</h5>

                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->address }}</td>
                                <td>{{ $event->timestart }}</td>
                                <td>{{ $event->timeend }}</td>
                                <td><a href="#">View Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>



</div>

@endsection
