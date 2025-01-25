<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AgamaSeeder::class);

        // Admin
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'), // Use bcrypt to hash the password
            'role' => 'admin', // Role set to admin
        ]);

        // User
        \App\Models\User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'), // Use bcrypt to hash the password
            'role' => 'user', // Role set to user
        ]);
    }
}
