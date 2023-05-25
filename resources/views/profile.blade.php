@extends('layouts.default')

@section('header_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/theme.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

    <script>
        window.$ = jQuery;

        $(document).ready(function(){
            $("#bdate").datepicker({
                dateFormat: 'yy/mm/dd',
                changeMonth: true,
                changeYear: true,
            });
        });
    </script>
@endsection
@section('content')

    <div id="dashboard">
        <header>
            <h3>Profile</h3>
        </header>

        <div class="p-3 m-t-5">

            <div class="row">
                <div class="col-md-12">

                    <form action="{{ route('upload-profile') }}" class="form col-md-6 offset-3" method="post" enctype="multipart/form-data">
                        @csrf

                        @error('upload')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="{{ url('/profiles') }}/{{$image}}" alt="profile picture" style="width: auto; height: 200px;" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="profile-picture text-center mt-2 col-md-6 offset-2 text-right">
                                <input type="file" name="upload" class="form-control mt-3"/>
                                <input type="hidden" name="id" value="@isset($id){{$id}}@endisset" />
                            </div>

                            <div class="col-md-4 mt-2">
                                <div class="text-left">
                                    <input type="submit" name="submit" value="upload" class="btn btn-primary mt-3"/>
                                </div>
                            </div>
                        </div>


                    </form>



                    <div class="spacer m-5"></div>



                    <form action="{{ route('profile-store') }}" method="post" class="form col-md-6 offset-3">
                        @csrf

                        @if( $message = Session::get('error'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        @if( $message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="#">First Name</label>
                                <input type="text" name="fname" id="first" class="form-control @error('fname') is-invalid @enderror" value="@isset($fname){{ $fname }} @endisset"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="#">Middle Name</label>
                                <input type="text" name="mname" class="form-control @error('mname') is-invalid @enderror" value="@isset($mname){{ $mname }}@endisset"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="#">Last Name</label>
                                <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror" value="@isset($lname){{ $lname }}@endisset"/>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-12">
                                <label for="#">Birth Date</label>
                                <input type="text" class="form-control @error('bdate') is-invalid @enderror" name="bdate" id="bdate" value="@isset($mname){{ $bdate }}@endisset">
                            </div>
                        </div>

                        <div class="row mt-3">

                            <div class="form-group col-md-6">
                                <label for="#">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="@isset($email){{ $email }}@endisset" disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="#">Phone</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="@isset($mname){{ $phone }}@endisset">
                            </div>

                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-12">
                                <label for="#">Address</label>
                                <textarea name="address" id="address" style="height: 100px" class="form-control @error('address') is-invalid @enderror">@isset($address){{ $address }}@endisset</textarea>
                            </div>
                        </div>

                        <div class="mt-3">
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}"/>
                            <input type="hidden" name="id" value="@isset($id){{ $id }}@endisset" />
                            <input type="hidden" name="image" value="@isset($image){{$image}}@endisset" />
                            <input type="submit" class="btn btn-primary" value="Update"/>
                            <a href="#" class="btn btn-dark">QR Code</a>
                        </div>

                    </form>

                </div>
                <div class="col-md-9">


                    
                </div>
            </div>

        </div>


    </div>

@endsection
