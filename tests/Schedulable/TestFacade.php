<?php

namespace berthott\Schedulable\Tests\Schedulable;

use Illuminate\Support\Facades\Facade;

class TestFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TestFacade';
    }
}
