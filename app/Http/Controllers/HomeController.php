<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class HomeController extends Controller
{
    const SHOWN_POLLS = 6;

    public function index()
    {
        $recentPolls = Poll::recents(static::SHOWN_POLLS);

        $endedPolls = Poll::ended(static::SHOWN_POLLS);

        $myPolls = \Auth::user() ? \Auth::user()->lastPolls(static::SHOWN_POLLS) : false;

        return view('welcome', compact('recentPolls', 'endedPolls', 'myPolls'));
    }
}
