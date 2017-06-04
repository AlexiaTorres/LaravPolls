@extends('vendor.backpack.base.polls_layout')

@section('content')
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                @include('includes.polls-portfolio', [
                    'polls' => $recentPolls,
                    'title' => 'Recent Polls',
                ])

                <div class="divider divider-center"><i class="fa fa-bar-chart"></i></div>

                @if(Auth::user())
                    @include('includes.polls-portfolio', [
                        'polls' => $myPolls,
                        'title' => 'My Polls',
                    ])
                @endif

                <div class="divider divider-center"><i class="fa fa-bar-chart"></i></div>

                @include('includes.polls-portfolio', [
                    'polls' => $endedPolls,
                    'title' => 'Last Closed Polls',
                ])
            </div>
        </div>
    </section>


@endsection
