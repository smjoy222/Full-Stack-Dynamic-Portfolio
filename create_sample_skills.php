<?php
// Simple script to create sample skills for testing
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Get the user ID from config
$userId = (int) config('portfolio.owner_user_id', 1);
echo "Creating sample skills for user ID: $userId\n";

// Create technical skills
$technicalSkills = [
    ['name' => 'HTML', 'level' => 72],
    ['name' => 'Flutter', 'level' => 80],
    ['name' => 'Programming', 'level' => 85],
    ['name' => 'Research', 'level' => 90],
];

// Create professional skills
$professionalSkills = [
    ['name' => 'Team Work', 'level' => 90],
    ['name' => 'Creativity', 'level' => 80],
    ['name' => 'Project Management', 'level' => 70],
    ['name' => 'Communication', 'level' => 75],
];

foreach ($technicalSkills as $skill) {
    \App\Models\Skill::updateOrCreate(
        ['name' => $skill['name'], 'user_id' => $userId],
        [
            'type' => 'technical',
            'level' => $skill['level'],
        ]
    );
    echo "Created/updated technical skill: {$skill['name']}\n";
}

foreach ($professionalSkills as $skill) {
    \App\Models\Skill::updateOrCreate(
        ['name' => $skill['name'], 'user_id' => $userId],
        [
            'type' => 'professional',
            'level' => $skill['level'],
        ]
    );
    echo "Created/updated professional skill: {$skill['name']}\n";
}

echo "\nSkills created successfully!\n";