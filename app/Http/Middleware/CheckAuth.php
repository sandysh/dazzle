<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckAuth
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
        if(Auth::check())
        {
            return $next($request);
        } else {
            abort(403, 'You are not authorised to enter this area.', $headers=[]);
        }
        
    }
}
