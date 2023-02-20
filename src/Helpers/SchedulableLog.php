<?php

namespace berthott\Schedulable\Helpers;

use Illuminate\Support\Facades\Log;

class SchedulableLog
{
    public function log(string $message): void
    {
        //$this->line($message);
        Log::channel('schedulable')->info($message);
    }
}
