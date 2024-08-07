<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'ridho',
                'email' => 'ridho@gmail.com',
                'password' => Hash::make('123'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
