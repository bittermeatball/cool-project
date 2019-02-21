<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\User;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        if ( Auth::check() && Auth::user()->role == $roles)
        {
            return $next($request);
        } else {
            return redirect('/403');
        }
    }
}
