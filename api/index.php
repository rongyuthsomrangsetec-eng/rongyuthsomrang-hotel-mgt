<?php

// 1. Ensure required storage directories exist in writable /tmp (Vercel Serverless environment)
$storageDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/database',
    '/tmp/views',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// 2. Prepare writable SQLite database in /tmp if running SQLite
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database/database.sqlite';

if (file_exists($sourceDb) && (!file_exists($targetDb) || filesize($targetDb) === 0)) {
    @copy($sourceDb, $targetDb);
} elseif (!file_exists($targetDb)) {
    @touch($targetDb);
}

// 3. Set environment variables for serverless runtime
if (!getenv('DB_CONNECTION')) {
    putenv('DB_CONNECTION=sqlite');
    putenv('DB_DATABASE=' . $targetDb);
    $_ENV['DB_CONNECTION'] = 'sqlite';
    $_ENV['DB_DATABASE'] = $targetDb;
}

putenv('APP_STORAGE=/tmp/storage');
$_ENV['APP_STORAGE'] = '/tmp/storage';

putenv('VIEW_COMPILED_PATH=/tmp/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/views';

putenv('SESSION_DRIVER=cookie');
$_ENV['SESSION_DRIVER'] = 'cookie';

putenv('CACHE_STORE=array');
$_ENV['CACHE_STORE'] = 'array';

putenv('LOG_CHANNEL=stderr');
$_ENV['LOG_CHANNEL'] = 'stderr';

// 4. Forward to Laravel front controller
require __DIR__ . '/../public/index.php';
