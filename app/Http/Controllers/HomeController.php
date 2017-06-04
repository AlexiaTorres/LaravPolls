<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class HomeController extends Controller
{
    public function index()
    {
        $recentPolls = Poll::recents(6);

        $endedPolls = Poll::ended(6);

        $myPolls = \Auth::user() ? Poll::ownedBy(\Auth::user()->id, 6) : [];

        return view('welcome', compact('recentPolls', 'endedPolls', 'myPolls'));
    }
}
