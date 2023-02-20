<?php

namespace berthott\Schedulable;

use berthott\Schedulable\Facades\Schedulable;
use berthott\Schedulable\Helpers\SchedulableLog;
use berthott\Schedulable\Services\SchedulableService;
use Illuminate\Console\Scheduling\Schedule;
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
        $this->app->singleton('SchedulableLog', function () {
            return new SchedulableLog();
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

        // register log channel
        $this->app->make('config')->set('logging.channels.schedulable', [
            'driver' => 'daily',
            'path' => storage_path('logs/schedulable.log'),
            'level' => 'debug',
        ]);

        // add scheduled commands
        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            Schedulable::addSchedules($schedule);
        });
    }
}
