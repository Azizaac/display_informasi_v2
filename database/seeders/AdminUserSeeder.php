<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin user exists
        if (!User::where('email', 'admin@admin.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]);
            $this->command->info('Admin user created (admin@example.com / password)');
        } else {
            $this->command->info('Admin user already exists');
        }
    }
}
