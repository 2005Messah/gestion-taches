<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // ✅ c'est important, pas Database\Seeders\App\Models\User
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Alice',
            'email' => 'alice@test.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Bob',
            'email' => 'bob@test.com',
            'password' => Hash::make('password')
        ]);
    }
}