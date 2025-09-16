<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// List all users
$users = \App\Models\User::all();
echo "All users in database:\n";
foreach ($users as $user) {
    echo "ID: {$user->id}, Name: {$user->name}, Email: {$user->email}\n";
}

// Check config value
$configOwnerId = config('portfolio.owner_user_id');
echo "\nCurrent portfolio.owner_user_id: {$configOwnerId}\n";

// Check if user exists with that ID
$owner = \App\Models\User::find($configOwnerId);
if ($owner) {
    echo "Found portfolio owner: {$owner->name} (ID: {$owner->id})\n";
} else {
    echo "ERROR: No user found with ID {$configOwnerId}!\n";
}

// Check the newly created admin
$admin = \App\Models\User::where('email', 'smjoy222@gmail.com')->first();
if ($admin) {
    echo "\nNew admin user: {$admin->name} (ID: {$admin->id})\n";
} else {
    echo "\nNew admin user not found!\n";
}
