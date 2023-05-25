
@extends('layouts.default')

@section('header_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/theme.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script>
        window.$ = jQuery;

        var selected_id = 0;
        var current_points = 0;

        $(document).ready(function(){

            const modal = $("#staticBackdrop").modal();

            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $(".modal-link").on("click", function(){
                selected_id = $(this).data("id");
                current_points = $(this).data("points");
                console.log(selected_id);
            });

            $("#btn-proceed").on("click", function(){
                $.post('{{ route('events-points-to-donor', ["id" => $event->id]) }}', {
                    event_id : "{{ $event->id }}",
                    user_id : selected_id,
                    points: current_points,
                    "_token": "{{ csrf_token() }}",
                }, function(data){
                    console.log(data);
                })

                //modal.hide();
            });

        });



    </script>
@endsection
@section('content')

    <div id="dashboard">
        <header>
            <h3>Events - Points</h3>
        </header>

        <div class="p-5">

            <div class="row">

                <div class="col-md-2">
                    <a href="{{ route('events') }}" class="btn btn-secondary d-inline-block"><< back to events</a>
                </div>

                <div class="clear clear-fix"></div>

                <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="form">
                            <input type="text" name="search" id="myInput" placeholder="Search Donors..." class="form-control">
                        </div>
                    </div>
                </div>

                <table id="myTable" class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donors as $donor)
                        <tr>
                            <td>{{ $donor->fname }} {{ $donor->mname }} {{ $donor->lname }}</td>
                            <td>{{ $donor->user->email }}</td>
                            <td>{{ $donor->address }}</td>
                            <td><!-- Button trigger modal -->
                                <?php $history = $donor->history->where('id', $event->id)->first(); ?>
                                @if( ! isset($history->points) )
                                <button type="button" class="btn btn-primary modal-link" data-id="{{ $donor->id }}" data-points="{{ $event->points }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                                    Add Points
                                </button>
                                @else
                                    <button type="button" class="btn btn-secondary">Given</button>
                                @endisset
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Are you sure want to add points to this user?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    --
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-cancel" class="btn btn-secondary" data-bs-dismiss="modal">No! Just a missed click!</button>
                    <button type="button" id="btn-proceed" class="btn btn-primary" data-bs-dismiss="modal">Yes, He/She deserves it!</button>
                </div>
            </div>
        </div>
    </div>


@endsection
