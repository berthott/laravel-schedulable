<?php

namespace berthott\Schedulable\Helpers;

use Illuminate\Support\Facades\Log;

class SchedulableLog
{
    public function log(string $message): void
    {
        Log::channel('schedulable')->info($message);
    }
}
