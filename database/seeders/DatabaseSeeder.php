<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Voyager core seeders (creates roles, permissions, menus, settings, etc.)
            VoyagerDatabaseSeeder::class,

            // Voyager's default admin user (uses roles table)
            UsersTableSeeder::class,

            // Project-specific roles/users seeding (safe upsert)
            RolesAndUsersSeeder::class,

            // Register BREAD for portfolio tables and seed sample data
            PortfolioBreadSeeder::class,
            PortfolioSeeder::class,
        ]);
    }
}
