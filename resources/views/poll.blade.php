@extends('vendor.backpack.base.polls_layout')

@section('content')
    <div class="container">
        <h3 class="poll-title">{{$poll->title}}</h3>

        @if(!auth()->user())
            <button class="btn btn-login-for-vote">
                <a href="{{route('auth.login')}}">
                    Log in to answer the poll
                    <br/>
                    <i class="fa fa-exclamation-triangle"></i>
                </a>
            </button>
        @endif

        {{ Form::open() }}
        @foreach($poll->questions as $question)
            <div class="question-span">{{$question->question}}</div>
            @foreach($question->options as $option)
                <div class="options">
                    <input id="{{$option->id}}"
                           class="radio-style"
                           name="question_{{$question->id}}"
                           value="{{$option->id}}"
                           type="radio"
                           {{ Auth::user() ? '' : 'disabled'}}
                           required
                    />
                    <label for="{{$option->id}}" class="radio-style-2-label">{{$option->option}}</label>
                </div>
            @endforeach
        @endforeach
        @if(auth()->user())
            <button type="submit" class="btn btn-send">
                Send
                <i class="fa fa-send"></i>
            </button>
            <a href="{{route('result', compact('poll'))}}" class="btn btn-view">
                View Results
                <i class="fa fa-pie-chart"></i>
            </a>
        @endif
        {{ Form::close() }}
    </div>
@endsection
