<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("products")->insert([
            'name' => Str::random(10),
            'type' => Str::random(10),
            'parts' => 10,
            'selling_price' => 200.00,
            'material_cost' => 100.00,
            'cost_per_part', => 10.00,
            'build_time' => 60,
            'status' => 'waiting',
            'img' => 'noimage.jpg'
        ]);
        DB::table("products")->insert([
            'name' => Str::random(10),
            'type' => Str::random(10),
            'parts' => 10,
            'selling_price' => 200.00,
            'material_cost' => 100.00,
            'cost_per_part', => 10.00,
            'build_time' => 60,
            'status' => 'waiting',
            'img' => 'noimage.jpg'
        ]);
        DB::table("products")->insert([
            'name' => Str::random(10),
            'type' => Str::random(10),
            'parts' => 10,
            'selling_price' => 200.00,
            'material_cost' => 100.00,
            'cost_per_part', => 10.00,
            'build_time' => 60,
            'status' => 'waiting',
            'img' => 'noimage.jpg'
        ]);
        DB::table("products")->insert([
            'name' => Str::random(10),
            'type' => Str::random(10),
            'parts' => 10,
            'selling_price' => 200.00,
            'material_cost' => 100.00,
            'cost_per_part', => 10.00,
            'build_time' => 60,
            'status' => 'waiting',
            'img' => 'noimage.jpg'
        ]);
        DB::table("products")->insert([
            'name' => Str::random(10),
            'type' => Str::random(10),
            'parts' => 10,
            'selling_price' => 200.00,
            'material_cost' => 100.00,
            'cost_per_part', => 10.00,
            'build_time' => 60,
            'status' => 'waiting',
            'img' => 'noimage.jpg'
        ]);
        DB::table("products")->insert([
            'name' => Str::random(10),
            'type' => Str::random(10),
            'parts' => 10,
            'selling_price' => 200.00,
            'material_cost' => 100.00,
            'cost_per_part', => 10.00,
            'build_time' => 60,
            'status' => 'waiting',
            'img' => 'noimage.jpg'
        ]);
        DB::table("products")->insert([
            'name' => Str::random(10),
            'type' => Str::random(10),
            'parts' => 10,
            'selling_price' => 200.00,
            'material_cost' => 100.00,
            'cost_per_part', => 10.00,
            'build_time' => 60,
            'status' => 'waiting',
            'img' => 'noimage.jpg'
        ]);
        DB::table("products")->insert([
            'name' => Str::random(10),
            'type' => Str::random(10),
            'parts' => 10,
            'selling_price' => 200.00,
            'material_cost' => 100.00,
            'cost_per_part', => 10.00,
            'build_time' => 60,
            'status' => 'waiting',
            'img' => 'noimage.jpg'
        ]);
        DB::table("products")->insert([
            'name' => Str::random(10),
            'type' => Str::random(10),
            'parts' => 10,
            'selling_price' => 200.00,
            'material_cost' => 100.00,
            'cost_per_part', => 10.00,
            'build_time' => 60,
            'status' => 'waiting',
            'img' => 'noimage.jpg'
        ]);
        DB::table("products")->insert([
            'name' => Str::random(10),
            'type' => Str::random(10),
            'parts' => 10,
            'selling_price' => 200.00,
            'material_cost' => 100.00,
            'cost_per_part', => 10.00,
            'build_time' => 60,
            'status' => 'waiting',
            'img' => 'noimage.jpg'
        ]);
    }
}
