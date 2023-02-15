<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // dd(auth()->user()->id);
        if (Auth::guard($guard)->check()) {
            if (auth()->user()->user_type == 'App\Admin') {
                return redirect('admin/index');
            } else if (Auth::user()->user_type == 'App\Bidan') {
                return redirect('bidan/index');
            } else  if (Auth::user()->user_type == 'App\Pegawai') {
                return redirect('pegawai/index');
            } else {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
