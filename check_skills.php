<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Check if skills exist in the database
$userId = (int) config('portfolio.owner_user_id', 1);
echo "Looking for skills for user ID: $userId\n";

$skills = \App\Models\Skill::where('user_id', $userId)->get();

if ($skills->isEmpty()) {
    echo "No skills found for user $userId.\n";
} else {
    echo "Found " . $skills->count() . " skills:\n";
    
    foreach ($skills as $skill) {
        echo "ID: {$skill->id}, Name: {$skill->name}, Type: {$skill->type}, Level: {$skill->level}\n";
    }
}

echo "\nChecking skill types allowed in migration:\n";
try {
    $columns = \Schema::getColumnListing('skills');
    echo "Columns in skills table: " . implode(', ', $columns) . "\n";
    
    // Try to get the type column definition
    $typeColumn = \DB::select("SHOW COLUMNS FROM skills WHERE Field = 'type'");
    if (!empty($typeColumn)) {
        echo "Type column definition: " . json_encode($typeColumn) . "\n";
    }
} catch (\Exception $e) {
    echo "Error getting schema info: " . $e->getMessage() . "\n";
}