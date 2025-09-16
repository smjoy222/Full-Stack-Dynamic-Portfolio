<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Get the list of users
$users = DB::table('users')->select('id', 'name', 'email')->get();
echo "Available users in database:\n";
foreach ($users as $user) {
    echo "ID: {$user->id}, Name: {$user->name}, Email: {$user->email}\n";
}

echo "\nChecking portfolio configuration:\n";
echo "Owner User ID: " . config('portfolio.owner_user_id') . "\n";