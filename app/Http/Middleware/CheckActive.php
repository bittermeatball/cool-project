<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Closure;

class CheckActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $status)
    {
        if ( Auth::check() && Auth::user()->status == $status)
        {
            return $next($request);
        } else {
            return redirect('/403/banned');
        }
    }
}
