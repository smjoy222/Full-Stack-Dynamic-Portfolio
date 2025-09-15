<?php
// Script to update all admin logo styling to blue and white
$directory = __DIR__ . '/resources/views/admin';
$pattern = '/<a href="\{\{ route\(\'admin\.dashboard\'\) \}\}" style="text-decoration:none;"><div class="logo"><span style="color:#12f7ff">A<\/span>dmin<\/div><\/a>/';
$replacement = '<a href="{{ route(\'admin.dashboard\') }}" style="text-decoration:none;"><div class="logo"><span style="color:#12f7ff">A</span><span style="color:white">dmin</span></div></a>';

$directoryIterator = new RecursiveDirectoryIterator($directory);
$iterator = new RecursiveIteratorIterator($directoryIterator);
$bladeFiles = new RegexIterator($iterator, '/\.blade\.php$/i');

$updatedFiles = 0;
foreach ($bladeFiles as $file) {
    $content = file_get_contents($file->getPathname());
    $newContent = preg_replace($pattern, $replacement, $content, -1, $count);
    
    if ($count > 0) {
        file_put_contents($file->getPathname(), $newContent);
        $updatedFiles++;
        echo "Updated: " . $file->getPathname() . "\n";
    }
}

echo "Updated $updatedFiles files.\n";