<a href="{{ route('crud.poll.index')}}"
   class="btn btn-info">
    <i class="fa fa-chevron-left"></i>
    Back to Polls
</a>
<br>
<h3>{{ \App\Models\Poll::find(\Route::current()->parameter('poll_id'))->title }}</h3>