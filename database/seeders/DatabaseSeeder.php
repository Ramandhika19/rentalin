<?php

namespace Database\\Seeders;

use App\\Models\\Vehicle;
use Illuminate\\Database\\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Vehicle::firstOrCreate(['plate_number'=>'DK 1001 AA'],['name'=>'Honda Vario 160','type'=>'motor','brand'=>'Honda','description'=>'Motor matic nyaman untuk perjalanan dalam kota.','price_per_day'=>120000,'status'=>'available']);
        Vehicle::firstOrCreate(['plate_number'=>'DK 1002 AA'],['name'=>'Toyota Avanza','type'=>'mobil','brand'=>'Toyota','description'=>'Mobil keluarga untuk perjalanan bersama.','price_per_day'=>450000,'status'=>'available']);
    }
}
