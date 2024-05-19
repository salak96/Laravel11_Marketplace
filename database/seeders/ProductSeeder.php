<?php

namespace Database\Seeders;

use Faker\Core\Number;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'name' => Str::random(5),
                'slug' => Str::slug('Fruits'),
                'description' => Str::random(10),
                'price' => rand(150000, 1123000),
                'discount' => 0,
                'image' => Str::random(10),
                'categories_id' => rand(1, 5),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}