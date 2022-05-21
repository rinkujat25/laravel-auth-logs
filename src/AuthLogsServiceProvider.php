<?php

namespace Rinku\Authlogs;

use Illuminate\Support\ServiceProvider;
use Rinku\Authlogs\Providers\EventServiceProvider;

class AuthLogsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
        $this->publishes([
            __DIR__ . '/migrations' => base_path('database/migrations'),
            __DIR__ . '/Models' => base_path('app/Models'),
            __DIR__ . '/Listeners' => base_path('app/Listeners'),
        ]);
    }
}
