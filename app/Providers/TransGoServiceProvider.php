<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TransGoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/transgo.php', 'transgo'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/transgo.php' => config_path('transgo.php'),
        ], 'transgo-config');
    }
}
