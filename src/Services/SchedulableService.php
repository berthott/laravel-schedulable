<?php

namespace berthott\Schedulable\Services;

use berthott\Schedulable\Jobs\HandleScheduledTask;
use berthott\Schedulable\Models\Traits\Schedulable;
use berthott\Targetable\Services\TargetableService;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Str;

class SchedulableService extends TargetableService
{
    /**
     * The Constructor.
     */
    public function __construct()
    {
        parent::__construct(Schedulable::class, 'schedulable');
    }

    public function addSchedules(Schedule $schedule)
    {
        foreach($this->getTargetableClasses() as $target) {
            foreach($this->getTasks($target) as $task) {
                $schedule->job(new HandleScheduledTask($target, $task))->cron(config('schedulable.cron'));
            }
        }
    }

    private function getTasks(string $target)
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
