<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('categories')->insert([
                'name' => Str::random(5),
                'slug' => Str::slug('Fruits'),
                'icon' => 'jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}