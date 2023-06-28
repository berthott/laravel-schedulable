<?php

namespace berthott\Schedulable\Jobs;

use berthott\Schedulable\Facades\SchedulableLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;

/**
 * Illuminate\Contracts\Queue\ShouldQueue implementation to handle scheduled tasks.
 */
class HandleScheduledTask implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    public function __construct(public string $target, public string $task) {}

    /**
     * Run the task for every entity of the target.
     */
    public function handle()
    {
        SchedulableLog::log("[{$this->target}] running task {$this->task}");
        $task = $this->task;
        $this->target::all()->each(fn($entity) => $entity->$task());
    }
}