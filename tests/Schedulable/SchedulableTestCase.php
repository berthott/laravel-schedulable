<?php

namespace berthott\Schedulable\Tests\Schedulable;

use berthott\Schedulable\SchedulableServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
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
        $app->singleton('TestFacade', function () use ($app) {
            return;
        });
        Config::set('schedulable.namespace', __NAMESPACE__);
        Schema::create('entities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
    }
}
