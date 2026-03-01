<?php

namespace App\Providers;

use App\Http\View\Composers\WebLayoutComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['web.weblayout', 'web.homepage', 'web.contact.index'], WebLayoutComposer::class);
    }
}
