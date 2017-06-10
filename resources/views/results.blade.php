@extends('vendor.backpack.base.polls_layout')

@section('content')
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <h3 class="poll-title center">{{$poll->title}}</h3>

                @foreach($poll->questions as $question)
                    <span class="question-span">{{$question->question}}</span>
                    <div class="chart-wrapper">
                        {!! $question->chart()->render() !!}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
