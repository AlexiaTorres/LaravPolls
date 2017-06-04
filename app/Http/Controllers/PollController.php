<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Poll;

class PollController extends Controller
{

    public function index()
    {
        $polls = Poll::paginate(6);
        return view('polls')->with('polls', $polls);
    }

   public function show(Poll $poll)
    {
        return view('poll')->with('poll', $poll);
    }

}