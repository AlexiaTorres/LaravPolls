<div class="container center poll-portfolio">
    <div class="fancy-title title-center title-dotted-border">
        <h3 class="poll-title">{{$title}}</h3>
        <div class="divider divider-center"><i class="fa fa-bar-chart"></i></div>
    </div>

    <div id="oc-images" class="owl-carousel image-carousel carousel-widget" data-margin="20" data-nav="true"
         data-pagi="false" data-items-xxs="2" data-items-xs="3" data-items-sm="4" data-items-md="5">
        @foreach($polls as $poll)
            <div class="oc-item">
                <a href="{{ $poll->route }}">
                    <img src="/img/poll.jpg"
                         alt="{{$poll->title}}">

                </a>
                <h4 style="">{{$poll->title}}</h4>
                <span class="poll-deadline">
                   {{ $poll->deadlinePrefix }} {{\Carbon\Carbon::parse($poll->deadline)->diffForHumans()}}
                </span>
            </div>

        @endforeach
    </div>
</div>