
@extends('layouts.default')

@section('header_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/theme.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script>
        window.$ = jQuery;

        $(document).ready(function(){
            $("#timeend").datepicker({
                dateFormat: 'yy/mm/dd'
            });
            $("#timestart").datepicker({
                dateFormat: 'yy/mm/dd'
            });
        });
    </script>
@endsection
@section('content')

    <div id="dashboard">
        <header>
            <h3>Events - Update/Create</h3>
        </header>

        <div class="p-5">

            <div class="row">

                <div class="col-md-2">
                    <a href="{{ route('events') }}" class="btn btn-secondary d-inline-block mt-5"><< back to events</a>
                </div>

                <div class="clear clear-fix"></div>

                <form action="{{ route('events-store') }}" method="post" enctype="multipart/form-data" class="form col-md-10">
                    @csrf

                    <div class="row">
                        <div class="form-group mt-3 col-md-6">
                            <label for="#">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="@isset($name){{$name}}@endisset">
                        </div>
                        <div class="form-group mt-3 col-md-6">
                            <label for="#">Points <small>( allocated points if user attends this event )</small></label>
                            <input type="number" name="points" class="form-control @error('points') is-invalid @enderror" value="@isset($points){{$points}}@endisset">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group mt-3 col-md-6">
                            <label for="#">Event Start</label>
                            <input type="text" name="timestart" id="timestart" class="form-control @error('timestart') is-invalid @enderror" value="@isset($timestart){{$timestart}}@endisset">
                        </div>
                        <div class="form-group mt-3 col-md-6">
                            <label for="#">Event End</label>
                            <input type="text" name="timeend" id="timeend" class="form-control @error('timeend') is-invalid @enderror" value="@isset($timeend){{$timeend}}@endisset">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="#">Address</label>
                        <textarea name="address" id="address" style="height: 100px" class="form-control @error('address') is-invalid @enderror">@isset($address){{$address}}@endisset</textarea>

                    </div>

                    <div class="form-group mt-3">
                        <label for="#">Details</label>
                        <textarea name="details" id="details" style="height: 100px" class="form-control @error('details') is-invalid @enderror">@isset($details){{$details}}@endisset</textarea>
                    </div>

                    <input type="hidden" name="id" value="@isset($id){{$id}}@endisset">
                    <input type="submit" name="submit" value="Create/Update Event" class="btn btn-primary mt-5">

                </form>

            </div>

        </div>


    </div>

@endsection
