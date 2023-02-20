<?php

namespace berthott\Schedulable\Facades;

use Illuminate\Support\Facades\Facade;

class Schedulable extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Schedulable';
    }
}
