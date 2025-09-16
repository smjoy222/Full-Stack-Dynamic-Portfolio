<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Get the admin user
$admin = \App\Models\User::where('email', 'smjoy222@gmail.com')->first();
if (!$admin) {
    echo "Admin user not found!\n";
    exit(1);
}

// Update the config file
$configPath = __DIR__.'/config/portfolio.php';
$configContent = file_get_contents($configPath);
$newContent = preg_replace(
    "/'owner_user_id' => env\('PORTFOLIO_OWNER_USER_ID', [0-9]+\),/",
    "'owner_user_id' => env('PORTFOLIO_OWNER_USER_ID', {$admin->id}),",
    $configContent
);

file_put_contents($configPath, $newContent);
echo "Configuration updated! Portfolio owner is now user ID: {$admin->id}\n";