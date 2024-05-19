<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'sasangka@gmail.com',
            'email_verified_at' => now(),
            'password' => 'password',
            'remember_token' => Str::random(10),
            'status'=>1
        ]);
    }
}