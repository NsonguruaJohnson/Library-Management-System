<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('secret'),
            'role' => 'admin',
            'is_verified' => 1
        ]);

        User::create([
            'name' => 'Nsongurua Akpan Johnson',
            'username' => 'Nsongurua',
            'email' => 'nsongurua@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'user',
            'is_verified' => 0
        ]);

        User::create([
            'name' => 'Ab',
            'username' => 'Ab',
            'email' => 'ab@xyz.com',
            'password' => Hash::make('abc'),
            'role' => 'user',
            'is_verified' => 0
        ]);
    }
}
