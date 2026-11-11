<?php
namespace App\Http\Middleware;
class RedirectIfAuthenticated {public function handle($request,\Closure $next,$guard=null){if(\Illuminate\Support\Facades\Auth::guard($guard)->check())return redirect('/dashboard');return $next($request);}}