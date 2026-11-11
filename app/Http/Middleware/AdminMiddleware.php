<?php
namespace App\Http\Middleware;
class AdminMiddleware {public function handle($request,\Closure $next){if(!$request->user()||$request->user()->role!=='admin')return redirect('/')->with('error','Akses khusus admin.');return $next($request);}}