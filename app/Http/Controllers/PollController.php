<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use Illuminate\Http\Request;

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

    public function store(Poll $poll, Request $request)
    {
        $inputs = $request->all();

        $answers = array_filter(
            $inputs,
            function ($key) {
                return starts_with($key, 'question_');
            },
            ARRAY_FILTER_USE_KEY
        );

        array_walk($answers, function ($optionId) {
            \Auth::user()->options()->attach($optionId);
        });

        alert()->success('Thank for your time');
        return redirect()->route('result', compact('poll'));
    }

}