<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'phone' => '+212600000000',
                'country' => 'Morocco',
                'city' => 'Casablanca',
                'address' => '123 Admin Street',
                'password' => Hash::make('password'),
                'role_id' => 1, // Admin
            ],
            [
                'name' => 'customer',
                'email' => 'customer@example.com',
                'phone' => '+212611111111',
                'country' => 'Morocco',
                'city' => 'Marrakech',
                'address' => '456 Customer Ave',
                'password' => Hash::make('password'),
                'role_id' => 2, // Customer
            ],
            [
                'name' => 'Delivery Guy',
                'email' => 'delivery@example.com',
                'phone' => '+212622222222',
                'country' => 'Morocco',
                'city' => 'Rabat',
                'address' => '789 Delivery Road',
                'password' => Hash::make('password'),
                'role_id' => 3, // Delivery Person
            ],
        ]);
    }
}
