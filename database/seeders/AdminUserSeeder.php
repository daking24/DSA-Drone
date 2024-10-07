<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure admin role exists
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create the admin user if not already there
        $adminUser = User::firstOrCreate(
            [
                'email' => 'admin@example.com',
                // email_verified_at is required for Laravel's built-in authentication
                'email_verified_at' => Carbon::now(),
            ], // Admin email
            [
                'name' => 'Admin User',
                'password' => Hash::make('AdminPass123!'),
            ]


        );

        // Assign the admin role to the user
        $adminUser->assignRole('admin');
    }
}
