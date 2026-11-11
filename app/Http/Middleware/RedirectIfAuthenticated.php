<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect(Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard'));
        }
        return $next($request);
    }
}
