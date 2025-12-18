<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| SOLUSI VERCEL READ-ONLY
|--------------------------------------------------------------------------
| Kita memindahkan folder storage dan cache ke folder /tmp
| karena Vercel tidak mengizinkan penulisan di folder proyek asli.
*/

$storagePath = '/tmp/storage';
// Buat folder storage di /tmp jika belum ada
if (!is_dir($storagePath)) {
    mkdir($storagePath, 0755, true);
}

// Buat folder cache khusus di dalam /tmp
$cachePath = $storagePath . '/bootstrap/cache';
if (!is_dir($cachePath)) {
    mkdir($cachePath, 0755, true);
}

// Beritahu Laravel untuk menggunakan path baru ini
$app->useStoragePath($storagePath);

// Override lokasi file-file cache agar masuk ke /tmp
$_ENV['APP_SERVICES_CACHE'] = $cachePath . '/services.php';
$_ENV['APP_PACKAGES_CACHE'] = $cachePath . '/packages.php';
$_ENV['APP_CONFIG_CACHE']   = $cachePath . '/config.php';
$_ENV['APP_ROUTES_CACHE']   = $cachePath . '/routes.php';
$_ENV['APP_EVENTS_CACHE']   = $cachePath . '/events.php';

// Jalankan aplikasi seperti biasa
$request = Illuminate\Http\Request::capture();
$response = $app->handle($request);
$response->send();
$app->terminate($request, $response);