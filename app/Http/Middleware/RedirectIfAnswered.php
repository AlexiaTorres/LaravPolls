<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class RedirectIfAnswered
{
    public function handle($request, Closure $next, $guard = null)
    {
        $user = auth()->user();

        if (! $user) {
            return $next($request);
        }

        $user->load('options.question.poll');

        $answeredPolls = $user->options->map(function ($option) {
            return $option->question->poll;
        })->unique();

        $poll = \Route::current()->parameter('poll');

        if ($answeredPolls->contains($poll)){
            return redirect()->route('result', compact('poll'));
        }

        return $next($request);
    }
}
