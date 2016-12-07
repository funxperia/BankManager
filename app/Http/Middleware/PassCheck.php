<?php

namespace App\Http\Middleware;

use Closure;

class PassCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('passcheck') == 0)
            return redirect('/');
        return $next($request);
    }
}
