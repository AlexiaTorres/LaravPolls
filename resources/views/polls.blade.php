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
                                        <img src="/img/poll_image.png"
                                             alt="{{$poll->title}}">
                                        <div class="mid">
                                            <h2 style="">{{$poll->title}}</h2>
                                        </div>
                                        <div class="portfolio-overlay">
                                            <div class="portfolio-desc">
                                                <h3>
                                                    {{$poll->title}}
                                                </h3>
                                                <span>
                                        <span>
                                            Deadline:
                                            <br/>
                                            {{$poll->deadline}}
                                        </span>
                                    </span>
                                            </div>
                                        </div>
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
