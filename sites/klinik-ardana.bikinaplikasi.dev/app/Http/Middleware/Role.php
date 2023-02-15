<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, String $role)
    {
        if (Auth::check()) {
            $auth = explode('\\', Auth::user()->user_type);
            $auth = end($auth);
            $auth = strtolower($auth);
            if ($auth != $role) {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
