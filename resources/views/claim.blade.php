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

        /** Rewards **/
        #rewards{}

        #rewards .current-points{
            margin: 2rem 0px;
        }

        #rewards .rewards-list{
            padding: 1rem;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        #rewards .rewards-list .reward-items{
            display: flex;
            width: 100%;

            flex-wrap: wrap;
            align-items: center;
            gap: 0.8rem;
            text-align: center;
        }



        #rewards .rewards-list .reward-items .item{
            flex-basis: 24%;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 200px;
            border: 1px solid #eee;
            background: #C92C6D;
            color: #fff;
            cursor: pointer;
        }

        #rewards .rewards-list .reward-items .item img{
            margin-bottom: 10px;
        }

        #rewards .rewards-list .reward-items .item:hover{
            background: #609EA2;
        }

        #rewards .rewards-list .reward-items .item:hover .points{
            background: #C92C6D;
        }

        #rewards .rewards-list .reward-items .item .points{
            display: block;
            font-size: 12px;
            position: absolute;
            top: 0px;
            left: 0px;
            background: #332C39;
            color: #F0EEED;
            padding: 10px;
        }

        #rewards .rewards-list .load-more{
            display:block;
            text-align: center;
            cursor: pointer;
        }


    </style>
@endsection
@section('content')

    <div>
        <header>
            <h3>Claim Rewards</h3>
        </header>

        <div class="p-3 m-t-5">

            <div id="rewards" class="">

                <div class="rewards-list">

                    <div class="item ebay-voucher">
                        <div class="reward-items">
                            @foreach($rewards as $reward)

                                <div class="item">
                                    <img src="{{ url("/") }}/rewards/{{$reward->image}}" />

                                    {{ $reward->name }}
                                    <span class="points">{{ $reward->points }} pts</span>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>

@endsection
