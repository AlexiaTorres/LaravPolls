@extends('backpack::login_layout')

@section('content')

    <div class="container clearfix">


        <h3 class="center">Login</h3>
        <div class="divider divider-center">
            <i class="fa fa-bar-chart"></i>
        </div>

        <div class="center">
            {!! $socialite_links !!}
        </div>

    </div>

@endsection
