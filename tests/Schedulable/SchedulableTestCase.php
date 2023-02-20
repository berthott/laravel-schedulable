<?php

namespace berthott\Schedulable\Tests\Schedulable;

use berthott\Schedulable\SchedulableServiceProvider;
use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class SchedulableTestCase extends BaseTestCase
{
    protected $now;

    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            SchedulableServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        Config::set('schedulable.namespace', __NAMESPACE__);
    }
}
