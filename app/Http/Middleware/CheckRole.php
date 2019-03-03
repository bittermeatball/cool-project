<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
        if ( Auth::check() ) {
            if ( Auth::user()->role == $roles || Auth::user()->role == 'administrator' )
            {
                return $next($request);
            }
            else 
            {
                return redirect('/403');
            }              
        }
    }
}
