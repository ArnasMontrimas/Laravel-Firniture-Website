<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfAdminOrSupervisor
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
        if(auth()->user()->type == 'admin' || auth()->user()->type == 'supervisor') {
            return $next($request);
        }
        else {
            return back();
        }
    }
}
