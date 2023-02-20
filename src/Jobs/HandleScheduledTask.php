<?php

namespace berthott\Schedulable\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;

class HandleScheduledTask implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    public function __construct(public string $target, public string $task) {}

    public function handle()
    {
        $task = $this->task;
        $this->target::all()->each(fn($entity) => $entity->$task());
    }
}