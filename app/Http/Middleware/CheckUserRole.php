<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, ...$role)
    {
        if ( Auth::user() == null || !in_array(Auth::user()->role, $role) ) {
            return abort(404);
        }

        return $next($request);
    }
}
