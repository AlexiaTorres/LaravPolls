@extends('vendor.backpack.base.polls_layout')

@section('content')
    <div class="container">
        <div id="portfolio" class="portfolio grid-container portfolio-3 clearfix">
            <div class="container center">
            <h3 class="center">Popular Polls</h3>
            <div class="divider divider-center"><i class="fa fa-bar-chart"></i></div>
            </div>
            {{--@foreach($polls as $poll)
                <article class="portfolio-item pf-illustrations">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="/img/poll_image.png"
                                 alt="{{$poll->title}}">
                            <div class="mid">
                                <h2 style="">{{$poll->title}}</h2>
                            </div>
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc">
                                <h3>
                                    <a href="">
                                        {{$poll->title}}
                                    </a>
                                </h3>
                                <span>
                                <span>
                                    Deadline:
                                    <br/>
                                    {{$poll->deadline}}
                                    <i class="fa fa-bar-chart"></i>
                                </span>
                            </span>
                            </div>
                        </div>
                    </div>
                </article>

            @endforeach--}}
        </div>
    </div>
@endsection
