<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Tambahkan layanan atau binding lain jika diperlukan
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Muat file breadcrumbs jika ada
        $breadcrumbsPath = base_path('routes/breadcrumbs.php');
        if (file_exists($breadcrumbsPath)) {
            require $breadcrumbsPath;
        }
    }
}
