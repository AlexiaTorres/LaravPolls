<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Poll;

class PollController extends Controller
{

    public function showMyPolls($id)
    {
        $polls = DB::table('polls')->where('user_id', '=', $id)->get();

        return view('my-polls')->with('polls', $polls);
    }

   /* public function showPoll($id)
    {
        $questions = Question::with(['options', 'poll'])
            ->where(['poll_id', '=', $id])
            ->get();

        return view('a-poll')->with('questions', $questions);
    }*/

}