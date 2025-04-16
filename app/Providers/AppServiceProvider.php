<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\Facades\Asset;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Configure Livewire update route for subdirectory
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/Events/livewire/update', $handle);
        });

        // Configure language switcher
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch->locales(['ar', 'en']);
        });

        // Only apply URL modifications for Filament routes
        $this->app->booted(function () {
            if (request()->is('Events/admin*')) {
                URL::forceRootUrl(config('app.url').'/Events');
            }
        });
        
  
    }
}