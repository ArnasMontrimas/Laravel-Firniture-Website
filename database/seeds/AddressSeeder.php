<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("addresses")->insert([
            'city' => Str::random(10),
            'street' => Str::random(10),
            'post_code' => Str::random(7)
        ]);
    }
}
