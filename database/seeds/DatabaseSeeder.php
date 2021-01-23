<?php

use Illuminate\Database\Seeder;
use Illuminate\App\Database\Seeds\AddressSeder;
use Illuminate\App\Database\Seeds\EmployeeSeder;
use Illuminate\App\Database\Seeds\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AddressSeeder::class,
            EmployeeSeeder::class,
            ProductSeeder::class,
        ]);
        
    }
}
