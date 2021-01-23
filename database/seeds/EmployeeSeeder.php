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
        DB::table("employees")->insert([
            'address_id' => 2,
            'name' => 'Test2',
            'surname' => 'Test sur2',
            'email' => 'test@test2.com',
            'password' => Hash::make('test2'),
            'type' => 'supervisor',
            'salary' => 50000.00,
            'start_date' => Carbon::now()->toDateTimeString(),
            'remember_token' => null,
        ]);
        DB::table("employees")->insert([
            'address_id' => 3,
            'name' => 'Test3',
            'surname' => 'Test sur3',
            'email' => 'test@test3.com',
            'password' => Hash::make('test3'),
            'type' => 'production',
            'salary' => 300.00,
            'start_date' => Carbon::now()->toDateTimeString(),
            'remember_token' => null,
        ]);
        DB::table("employees")->insert([
            'address_id' => 4,
            'name' => 'Test4',
            'surname' => 'Test sur4',
            'email' => 'test@test4.com',
            'password' => Hash::make('test4'),
            'type' => 'production',
            'salary' => 10000.00,
            'start_date' => Carbon::now()->toDateTimeString(),
            'remember_token' => null,
        ]);
        DB::table("employees")->insert([
            'address_id' => 5,
            'name' => 'Test5',
            'surname' => 'Test sur5',
            'email' => 'test5@test.com',
            'password' => Hash::make('test5'),
            'type' => 'production',
            'salary' => 20000.00,
            'start_date' => Carbon::now()->toDateTimeString(),
            'remember_token' => null,
        ]);
    }
}
