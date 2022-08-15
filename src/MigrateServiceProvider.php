<?php

namespace Biginvn\Migrate;

use Illuminate\Support\ServiceProvider;

class MigrateServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        // Register the service the package provides.
        $this->app->singleton('migrate', function ($app) {
            return new Migrate;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['migrate'];
    }
}
