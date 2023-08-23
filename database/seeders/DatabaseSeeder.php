<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed Users
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 1,
            'password' => Hash::make('admin123'), // Hash the password
        ]);

        // You can add more seed data here

    }
}
