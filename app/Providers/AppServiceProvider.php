<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL; // <-- Penting: Import Facade URL
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Menggunakan style Bootstrap untuk pagination
        Paginator::useBootstrap();

        // Memaksa HTTPS saat di Production (Vercel)
        // Ini obat untuk tampilan yang hancur/tidak memuat CSS
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}