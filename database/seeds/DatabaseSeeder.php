<?php

use Illuminate\\Database\\Seeder;
use App\\Models\\User;
use App\\Models\\Vehicle;
use Illuminate\\Support\\Facades\\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(['email' => 'admin@rentalin.test'], [
            'name' => 'Administrator',
            'phone' => '081234567890',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        Vehicle::firstOrCreate(['plate_number' => 'DK 1001 AA'], [
            'name' => 'Honda Vario 160',
            'type' => 'motor',
            'brand' => 'Honda',
            'description' => 'Motor matic nyaman untuk perjalanan dalam kota.',
            'price_per_day' => 120000,
            'status' => 'available'
        ]);

        Vehicle::firstOrCreate(['plate_number' => 'DK 1002 AA'], [
            'name' => 'Toyota Avanza',
            'type' => 'mobil',
            'brand' => 'Toyota',
            'description' => 'Mobil keluarga untuk perjalanan bersama.',
            'price_per_day' => 450000,
            'status' => 'available'
        ]);
    }
}
