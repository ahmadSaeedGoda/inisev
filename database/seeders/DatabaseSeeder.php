<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'micky',
            'email' => 'micky@example.com',
            'password' => Hash::make('Micky@123'),
        ]);
        DB::table('users')->insert([
            'name' => 'minnie',
            'email' => 'minnie@example.com',
            'password' => Hash::make('Minnie@123'),
        ]);
        DB::table('websites')->insert([
            'name' => 'Twitter',
            'url' => 'https://www.twitter.com',
        ]);
        DB::table('websites')->insert([
            'name' => 'Facebook',
            'url' => 'https://www.facebook.com',
        ]);
    }
}
