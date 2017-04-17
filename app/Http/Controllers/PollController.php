<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Poll;

class PollController extends Controller
{

    public function showAllPolls()
    {
        $polls = DB::table('polls')->get();

        return view('polls')->with('polls', $polls);
    }

   /* public function showPoll($id)
    {
        $questions = Question::with(['options', 'poll'])
            ->where(['poll_id', '=', $id])
            ->get();

        return view('a-poll')->with('questions', $questions);
    }*/

}