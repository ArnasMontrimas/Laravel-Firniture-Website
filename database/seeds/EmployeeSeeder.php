<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("employees")->insert([
            'address_id' => 1,
            'name' => 'Test',
            'surname' => 'Test sur',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
            'type' => 'admin',
            'salary' => 30000.00,
            'start_date' => Carbon::now()->toDateTimeString(),
            'remember_token' => null,
        ]);
    }
}
