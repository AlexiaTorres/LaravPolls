<a href="{{ route('crud.question.index', ['poll_id' => \Route::current()->parameter('poll_id')]) }}/"
   class="btn btn-info">
    <i class="fa fa-chevron-left"></i>
    Back to Questions
</a>
<br>
<h3>{{ \App\Models\Poll::find(\Route::current()->parameter('poll_id'))->title }}</h3>
<h4>{{ \App\Models\Question::find(\Route::current()->parameter('question_id'))->question }}</h4>