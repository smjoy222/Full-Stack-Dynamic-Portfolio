<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure roles exist via Voyager role model (still present in project)
        $roleModel = \TCG\Voyager\Models\Role::class;
        $adminRole = $roleModel::firstOrCreate(['name' => 'admin'], ['display_name' => 'Administrator']);
        $userRole = $roleModel::firstOrCreate(['name' => 'user'], ['display_name' => 'User']);

        $email = env('ADMIN_EMAIL', 'admin@example.com');
        $password = env('ADMIN_PASSWORD', 'password123');

        $user = User::firstOrNew(['email' => $email]);
        $user->name = $user->name ?: 'Site Admin';
        $user->password = Hash::make($password);
        $user->role_id = $adminRole->id;
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
