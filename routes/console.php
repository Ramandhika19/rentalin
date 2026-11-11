<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('rentalin:info', function () {
    $this->comment('Rentalin siap digunakan.');
})->purpose('Menampilkan status singkat Rentalin');
