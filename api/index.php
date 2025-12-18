<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| SOLUSI VERCEL: STRUKTUR FOLDER LENGKAP
|--------------------------------------------------------------------------
| Kita harus memastikan semua folder storage (Views, Sessions, Logs, Cache)
| benar-benar ada di dalam /tmp sebelum Laravel berjalan.
*/

$storagePath = '/tmp/storage';

// Daftar folder yang WAJIB dibuat manual
$dirs = [
    $storagePath,
    $storagePath . '/framework/views',    // <-- Ini obat error "valid cache path"
    $storagePath . '/framework/sessions', // <-- Jaga-jaga biar gak error session
    $storagePath . '/framework/cache',    // <-- Untuk cache umum
    $storagePath . '/logs',               // <-- Untuk log error
    $storagePath . '/bootstrap/cache',    // <-- Untuk cache sistem
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true); // true = recursive creation
    }
}

// Set path baru ke Laravel
$app->useStoragePath($storagePath);

// Override lokasi file cache bootstrap
$_ENV['APP_SERVICES_CACHE'] = $storagePath . '/bootstrap/cache/services.php';
$_ENV['APP_PACKAGES_CACHE'] = $storagePath . '/bootstrap/cache/packages.php';
$_ENV['APP_CONFIG_CACHE']   = $storagePath . '/bootstrap/cache/config.php';
$_ENV['APP_ROUTES_CACHE']   = $storagePath . '/bootstrap/cache/routes.php';
$_ENV['APP_EVENTS_CACHE']   = $storagePath . '/bootstrap/cache/events.php';

// Jalankan aplikasi
$request = Illuminate\Http\Request::capture();
$response = $app->handle($request);
$response->send();
$app->terminate($request, $response);