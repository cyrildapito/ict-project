
@extends('layouts.default')

@section('header_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/theme.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <style>
        .rewards-image{
            height: 50px;
            width: auto;
        }
    </style>
@endsection
@section('content')

    <div id="dashboard">
        <header>
            <h3>Rewards</h3>
        </header>

        <div class="p-3">

            <div class="row">

                <div class="col-md-2">
                    <a href="{{ route('rewards-create') }}" class="btn btn-primary d-inline-block mt-5 ">New Reward</a>
                </div>
                <div class="clear clear-fix"></div>

                @if( $msg = Session::get('success'))
                    <div class="alert alert-success mt-3 mb-3">{{ $msg }}</div>
                @endif
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th width="20%"><input type="checkbox" class="mr-2"> Name</th>
                            <th>Description</th>
                            <th>Points</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rewards as $reward)
                            <tr>
                                <td valign="middle">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <input type="checkbox"/>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="site-name">
                                                <a href="{{ route('rewards-edit', ["id" => $reward->id]) }}" class="text-decoration-none">{{ $reward->name }}</a>
                                            </div>
                                            <small>
                                                <a href="{{ route('rewards-edit', ["id" => $reward->id]) }}" class="text-secondary text-decoration-none"><i class="bi bi-pencil"></i> Edit</a> |
                                                <a href="{{ route('rewards-remove', ["id" => $reward->id]) }}" class="text-decoration-none text-danger"><i class="bi bi-trash"></i> Delete</a>
                                            </small>
                                        </div>
                                    </div>

                                    <div class="clear clear-fix"></div>
                                </td>
                                <td valign="middle">
                                    {{ $reward->description }}
                                </td>
                                <td  valign="middle">
                                    {{ $reward->points }}
                                </td>
                                <td  valign="middle">
                                    <img src="{{ url('/rewards') }}/{{ $reward->image }}" alt="rewards image" class="rewards-image">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>


    </div>

@endsection
