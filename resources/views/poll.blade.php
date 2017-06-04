@extends('vendor.backpack.base.polls_layout')

@section('content')
    <div class="container center">
        <h3 class="poll-title"><span>{{$poll->title}}</span></h3>
        @foreach($poll->questions as $question)
            <span class="question-span">{{$question->question}}</span>
            @foreach($question->options as $option)
                <div class="options">
                    <input id="{{$option->option}}" class="radio-style" name="{{$option->option}}" type="radio">
                    <label for="{{$option->option}}" class="radio-style-2-label">{{$option->option}}</label>
                </div>
            @endforeach
        @endforeach
        <img src="/img/koala.jpg" class="img-poll">
    </div>
@endsection
