<?php

namespace App\Http\Middleware;

use Closure;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;

class Visite
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
        //Visitor::hit();
        VisitLog::save();
        return $next($request);
    }
}
