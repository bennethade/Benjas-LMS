<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'photo' => null,
                'phone' => 1234567890,
                'address' => '123 Admin St, City, Country',
                'role' => 'admin',
                'status' => '1',   
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Instructor User',
                'email' => 'instructor@gmail.com',
                'password' => Hash::make('password'),
                'photo' => null,
                'phone' => 1234567890,
                'address' => '456 Instructor St, City, Country',
                'role' => 'instructor',
                'status' => '1',   
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Student User',
                'email' => 'student@gmail.com',
                'password' => Hash::make('password'),
                'photo' => null,
                'phone' => 1234567890,
                'address' => '789 Student St, City, Country',
                'role' => 'student',
                'status' => '1',   
                'created_at' => now(), 
                'updated_at' => now(),
            ]
        ]);
    }
}
