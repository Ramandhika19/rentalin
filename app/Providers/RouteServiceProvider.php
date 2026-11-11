<?php
namespace App\Providers;
class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider {protected $namespace='App\Http\Controllers';public function map(){\Illuminate\Support\Facades\Route::middleware('web')->namespace($this->namespace)->group(base_path('routes/web.php'));}}