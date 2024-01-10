<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Ahmed Elsewailky',
            'username' => 'admin',
            'email' => 'admin@yahoo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => str()->random(10),
            'is_admin' => true
        ]);
    }
}
