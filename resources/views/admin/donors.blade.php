
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
            <h3>Donors</h3>
        </header>

        <div class="p-5">

            <div class="row">

                @if( $msg = Session::get('success'))
                    <div class="alert alert-success mt-3 mb-3">{{ $msg }}</div>
                @endif

                <table class="table table-striped mt-4 ml-3">
                    <thead>
                    <tr>
                        <th width="20%"><input type="checkbox" class="mr-2"> Name</th>
                        <th>Profile Image</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Current Points</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($donors as $donor)
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-1">
                                        <input type="checkbox"/>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="site-name">
                                            {{ $donor->fname }} {{ $donor->mname }} {{ $donor->lname }}
                                        </div>
                                        <small>
                                            <a href="{{ route('rewards-edit', ["id" => $donor->id]) }}" class="text-blue-600">View Profile</a> |
                                            <a href="{{ route('rewards-remove', ["id" => $donor->id]) }}" class="text-danger">Update Points</a>
                                        </small>
                                    </div>
                                </div>

                                <div class="clear clear-fix"></div>
                            </td>
                            <td>
                                <img src="{{ url('/profiles') }}/{{ $donor->image }}" alt="rewards image" class="rewards-image">
                            </td>
                            <td>
                                {{ $donor->address }}
                            </td>
                            <td>
                                {{ $donor->user->email }}
                            </td>
                            <td>
                                {{ $donor->points }}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>


    </div>

@endsection
