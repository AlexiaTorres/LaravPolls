<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfDeadlineExpired
{
    public function handle($request, Closure $next, $guard = null)
    {
        $poll = \Route::current()->parameter('poll');

        if ($poll->expired) {
            alert()->error('Poll deadline has passed')->persistent('Ok');
            return redirect('/');
        }

        return $next($request);
    }
}
