<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Map existing enum strings to numeric percentages before altering type
        try {
            DB::statement("UPDATE skills SET level = 30 WHERE level = 'beginner'");
            DB::statement("UPDATE skills SET level = 60 WHERE level = 'intermediate'");
            DB::statement("UPDATE skills SET level = 90 WHERE level = 'expert'");
        } catch (\Throwable $e) {
            // ignore if table doesn't exist yet
        }

        // Change column type to UNSIGNED TINYINT (0-255)
        try {
            DB::statement('ALTER TABLE skills MODIFY level TINYINT UNSIGNED');
        } catch (\Throwable $e) {
            // If cannot alter (e.g., SQLite), attempt creating table first in fresh installs; otherwise ignore
        }
    }

    public function down(): void
    {
        // Best-effort rollback to enum values using thresholds
        try {
            DB::statement("ALTER TABLE skills MODIFY level ENUM('beginner','intermediate','expert')");
            DB::statement("UPDATE skills SET level = CASE
                WHEN level <= 40 THEN 'beginner'
                WHEN level <= 75 THEN 'intermediate'
                ELSE 'expert' END");
        } catch (\Throwable $e) {
            // ignore for non-MySQL or if not possible
        }
    }
};
