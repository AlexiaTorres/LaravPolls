<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class ResultController extends Controller
{
    public function show(Poll $poll)
    {
        return view('results', compact('poll'));
    }

}
