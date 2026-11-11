<?php
namespace App\Console;
class Kernel extends \Illuminate\Foundation\Console\Kernel {protected function schedule(\Illuminate\Console\Scheduling\Schedule $schedule){} protected function commands(){require base_path('routes/console.php');}}