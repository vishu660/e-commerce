<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'ROLE_ADMIN',
        ]);

        User::create([
            'name' => 'Vendor',
            'email' => 'vendor@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'ROLE_VENDOR',
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'ROLE_CUSTOMER',
        ]);
    }
}