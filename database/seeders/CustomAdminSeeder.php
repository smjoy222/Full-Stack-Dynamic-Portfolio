<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class CustomAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create or update the admin user
        $email = 'smjoy222@gmail.com';
        $password = 'joyj2001';
        
        // Find the admin role ID
        $roleModel = \TCG\Voyager\Models\Role::class;
        $adminRole = $roleModel::where('name', 'admin')->first();
        $roleId = $adminRole ? $adminRole->id : 1; // Default to 1 if not found
        
        // Create or update user
        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Joy Admin',
                'password' => Hash::make($password),
                'role_id' => $roleId,
                'remember_token' => Str::random(10),
            ]
        );
        
        $this->command->info("Admin user created/updated: {$email}");
    }
}