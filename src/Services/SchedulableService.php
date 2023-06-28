<?php

namespace berthott\Schedulable\Services;

use berthott\Schedulable\Jobs\HandleScheduledTask;
use berthott\Schedulable\Models\Traits\Schedulable;
use berthott\Targetable\Services\TargetableService;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Str;

/**
 * TargetableService implementation for an schedulable class.
 * 
 * @link https://docs.syspons-dev.com/laravel-targetable
 */
class SchedulableService extends TargetableService
{
    /**
     * The Constructor.
     */
    public function __construct()
    {
        parent::__construct(Schedulable::class, 'schedulable');
    }

    /**
     * Add a job to laravels schedule for each task on the target.
     * 
     * Use the frequency defined in the `schedulable.cron` config.
     */
    public function addSchedules(Schedule $schedule)
    {
        foreach($this->getTargetableClasses() as $target) {
            foreach($this->getTasks($target) as $task) {
                $schedule->job(new HandleScheduledTask($target, $task))->cron(config('schedulable.cron'));
            }
        }
    }

    /**
     * Find all schedulable* methods defined on the target.
     * 
     * @return string[]
     */
    private function getTasks(string $target): array
    {
        $tasks = [];
        foreach(get_class_methods($target) as $method) {
            if (Str::startsWith($method, 'schedule')) {
                $tasks[] = $method;
            }
        }
        return $tasks;
    }
}
