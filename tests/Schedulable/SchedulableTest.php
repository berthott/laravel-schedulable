<?php

namespace berthott\Schedulable\Tests\Schedulable;

use berthott\Schedulable\Facades\Schedulable;

class SchedulableTest extends SchedulableTestCase
{
    public function test_schedulable_found(): void
    {
        $schedulables = Schedulable::getTargetableClasses();
        $this->assertNotEmpty($schedulables);
    }
}
