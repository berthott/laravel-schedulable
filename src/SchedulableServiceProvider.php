<?php

namespace berthott\Schedulable;

use berthott\Schedulable\Services\SchedulableService;
use Illuminate\Support\ServiceProvider;

class SchedulableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // bind singletons
        $this->app->singleton('Schedulable', function () {
            return new SchedulableService($this->app);
        });

        // add config
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'schedulable');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // publish config
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('schedulable.php'),
        ], 'config');
    }
}
