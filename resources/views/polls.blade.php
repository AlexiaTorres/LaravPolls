@extends('vendor.backpack.base.polls_layout')

@section('content')
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div id="portfolio" class="portfolio grid-container portfolio-3 clearfix">
                    <div class="container center">
                        <h3 class="center section-title">All Polls</h3>
                        <div class="divider divider-center"><i class="fa fa-bar-chart"></i></div>
                        @foreach($polls as $poll)
                            <a href="{{ route('poll', ['id' => $poll->id]) }}">
                                <article class="portfolio-item pf-illustrations">
                                    <div class="portfolio-image">
                                        <img src="/img/poll.jpg"
                                             alt="{{$poll->title}}">
                                        <h4 class="poll-title">{{$poll->title}}</h4>
                                        <span class="poll-deadline">
                                            {{ $poll->deadlinePrefix }} {{\Carbon\Carbon::parse($poll->deadline)->diffForHumans()}}
                                        </span>
                                    </div>
                                </article>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="center">
        {{$polls->links()}}
    </div>
@endsection
