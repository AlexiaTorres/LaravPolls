@extends('vendor.backpack.base.polls_layout')

@section('content')
    <div class="container">
        <h3 class="poll-title center">{{$poll->title}}</h3>

        @foreach($poll->questions as $question)
            <span class="question-span">{{$question->question}}</span>
            <div class="chart-wrapper">
                {!! $question->chart()->render() !!}
            </div>
        @endforeach
    </div>
@endsection
