<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfEmailNotConfirmed
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()->confirmed) { // 如果用户未认证，则重定向
            return redirect('/threads')->with('flash', 'You must first confirm your email address.');
        }

        return $next($request);
    }
}
