<?php

namespace berthott\Schedulable\Tests\Schedulable;

use berthott\Schedulable\Facades\Schedulable;
use berthott\Schedulable\Jobs\HandleScheduledTask;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Bus;
use Mockery;

class SchedulableTest extends SchedulableTestCase
{
    public function test_schedulable_found(): void
    {
        $schedulables = Schedulable::getTargetableClasses();
        $this->assertNotEmpty($schedulables);
    }

    public function test_schedule(): void
    {
        $schedule = $this->app->make(Schedule::class);
        $events = $schedule->events();
        $this->assertCount(2, $events); // number of schedule methods defined in entity
    }

    public function test_job_dispatching(): void
    {
        Bus::fake();
        $this->travelTo(now()->addHour()->startOfHour());
        Artisan::call('schedule:run');
        Bus::assertDispatched(HandleScheduledTask::class, 2);
    } 

    public function test_scheduled_functions(): void
    {
        TestFacade::swap(Mockery::mock()
            ->shouldReceive('test')
            ->twice()
            ->getMock()
        );
        Entity::create();
        $this->travelTo(now()->addHour()->startOfHour());
        Artisan::call('schedule:run');
    } 
}
