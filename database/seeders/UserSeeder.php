<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Editor',
            'email' => 'editor@mail.com',
            'password' => Hash::make('password'),
            'role' => 'editor',
        ]);

        User::create([
            'name' => 'Wartawan',
            'email' => 'wartawan@mail.com',
            'password' => Hash::make('password'),
            'role' => 'wartawan',
        ]);
    }
}
