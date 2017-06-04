<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class HomeController extends Controller
{
    public function index()
    {
        $polls = Poll::all()->take(6);

        return view('welcome')->with('polls', $polls);
    }
}
