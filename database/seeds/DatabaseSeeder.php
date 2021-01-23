<?php

use Illuminate\Database\Seeder;
use Illuminate\App\Database\Seeds\AddressSeder;
use Illuminate\App\Database\Seeds\EmployeeSeder;

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
            
        ]);
        
    }
}
