<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RolesAndUsersSeeder extends Seeder
{
	/**
	 * Ensure required roles exist and seed a default test user with a valid role_id.
	 */
	public function run(): void
	{
		DB::transaction(function () {
			$now = now();

			// Ensure roles table has the baseline roles
			$adminRoleId = DB::table('roles')->where('name', 'admin')->value('id');
			if (!$adminRoleId) {
				$adminRoleId = DB::table('roles')->insertGetId([
					'name' => 'admin',
					'display_name' => 'Administrator',
					'created_at' => $now,
					'updated_at' => $now,
				]);
			}

			$userRoleId = DB::table('roles')->where('name', 'user')->value('id');
			if (!$userRoleId) {
				$userRoleId = DB::table('roles')->insertGetId([
					'name' => 'user',
					'display_name' => 'User',
					'created_at' => $now,
					'updated_at' => $now,
				]);
			}

			// Seed a demo user with the "user" role; upsert by email to avoid duplicates
			DB::table('users')->updateOrInsert(
				['email' => 'test@example.com'],
				[
					'name' => 'Test User',
					'email_verified_at' => $now,
					'password' => Hash::make('password'),
					'role_id' => $userRoleId,
					'remember_token' => Str::random(10),
					'created_at' => $now,
					'updated_at' => $now,
				]
			);
		});
	}
}

