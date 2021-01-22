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
            'city' => String::random(10),
            'street' => String::random(10),
            'post_code' => String::random(7)
        ]);
    }
}
