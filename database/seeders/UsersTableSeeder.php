<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Clear existing records to start with a clean slate
        DB::table('users')->truncate();

        // Seed user data
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('123456'),
                'account_type' => 'Individual',
                'balance' => 0, // Initial balance
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'password' => Hash::make('123456'),
                'account_type' => 'Business',
                'balance' => 0, // Initial balance
            ],
            // Add more users as needed
        ]);
    }
}
