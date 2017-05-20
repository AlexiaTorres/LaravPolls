@extends('vendor.backpack.base.polls_layout')

@section('content')
    <div class="container">
        <li id="portfolio" class="portfolio grid-container portfolio-3 clearfix">
            @foreach($poll->questions as $question)
                <ul>
                    <li>
                            {{$question->question}}
                    </li>
                </ul>

            @endforeach
        </div>
    </div>
@endsection
