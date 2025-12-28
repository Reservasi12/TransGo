<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@transgo.test',
            'password' => Hash::make('password'),
            'phone' => '081234567890',
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Create staff user
        User::create([
            'name' => 'Staff User',
            'email' => 'staff@transgo.test',
            'password' => Hash::make('password'),
            'phone' => '081234567891',
            'role' => 'staff',
            'is_active' => true,
        ]);

        // Create regular user
        User::create([
            'name' => 'John Doe',
            'email' => 'john@transgo.test',
            'password' => Hash::make('password'),
            'phone' => '081234567892',
            'role' => 'user',
            'is_active' => true,
        ]);

        // Create another user
        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@transgo.test',
            'password' => Hash::make('password'),
            'phone' => '081234567893',
            'role' => 'user',
            'is_active' => true,
        ]);
    }
}
