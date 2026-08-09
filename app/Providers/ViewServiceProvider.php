<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Bagikan data profil sekolah ke SEMUA view publik (navbar, footer, dll)
        View::composer(['layouts.*', 'partials.*', 'pages.*'], function ($view) {
            $view->with('setting', Setting::current());
        });
    }
}
