@extends('vendor.backpack.base.polls_layout')

@section('content')
    <section id="content">
        <div class="content-wrap">

            <img src="/img/koala_pc.png" class="img-responsive container">

            <div class="container clearfix">
                @include('includes.polls-portfolio', [
                    'polls' => $recentPolls,
                    'title' => 'Recent Polls',
                ])

                @if($myPolls && $myPolls->count())
                    @include('includes.polls-portfolio', [
                        'polls' => $myPolls,
                        'title' => 'My Polls',
                    ])
                @endif

                @if($endedPolls->count())
                    @include('includes.polls-portfolio', [
                        'polls' => $endedPolls,
                        'title' => 'Last Closed Polls',
                    ])
                @endif
            </div>
        </div>
    </section>


@endsection
