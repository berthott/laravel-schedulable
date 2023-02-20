<?php

namespace berthott\SX\Facades;

use Illuminate\Support\Facades\Facade;

class SchedulableLog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SchedulableLog';
    }
}
