
@extends('layouts.default')

@section('header_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/theme.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <style>
        .rewards-image{
            height: 200px;
            width: auto;
        }
    </style>
@endsection
@section('content')

    <div id="dashboard">
        <header>
            <h3>Rewards - Update/Create</h3>
        </header>

        <div class="content">

            <div class="row">

                <div class="col-md-2">
                    <a href="{{ route('rewards') }}" class="btn btn-secondary d-inline-block mt-5"><< back to rewards</a>
                </div>

                <div class="clear clear-fix"></div>

                <form action="{{ route('rewards-store') }}" method="post" enctype="multipart/form-data" class="form col-md-10">
                    @csrf
                    <div class="row mt-3">
                        <div class="form-group col-md-6">
                            <label for="#">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="@isset($name){{$name}}@endisset">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="#">Points <small>( number of points required for the reward to be claimed )</small></label>
                            <input type="number" name="points" class="form-control @error('points') is-invalid @enderror" value="@isset($points){{$points}}@endisset">
                        </div>
                    </div>


                    <div class="form-group mt-3">
                        <label for="#">Description</label>
                        <textarea name="description" id="description" style="height: 100px" class="form-control @error('name') is-invalid @enderror">@isset($description){{$description}}@endisset</textarea>
                    </div>

                    @error('upload')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="form-group mt-3">

                        <div class="clear clear-fix mt-5"></div>
                        @isset($image)
                        <figures class="figure">
                            <img src="{{ url('/rewards') }}/{{ $image }}" alt="rewards image" class="figure-img rounded rewards-image">
                            <figcaption class="figure-caption text-end">image preview</figcaption>
                        </figures>
                        @endisset
                        <div class="clear clear-fix"></div>
                        <label for="#" class="mb-5"></label>
                        <input type="file" name="upload" class="form-control"/>
                    </div>

                    <input type="hidden" name="id" value="@isset($id){{$id}}@endisset">
                    <input type="hidden" name="image" value="@isset($image){{$image}}@endisset">
                    <input type="submit" name="submit" value="Create/Update Site" class="btn btn-primary mt-5">

                </form>

            </div>

        </div>


    </div>

@endsection
