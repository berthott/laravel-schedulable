<?php

namespace berthott\Schedulable\Helpers;

use Illuminate\Support\Facades\Log;

/**
 * Logging helper class.
 */
class SchedulableLog
{
    /**
     * Log a message to the `schedulable` log.
     */
    public function log(string $message): void
    {
        Log::channel('schedulable')->info($message);
    }
}
