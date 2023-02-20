<?php

namespace berthott\Schedulable\Tests\Schedulable;

use berthott\Schedulable\Models\Traits\Schedulable;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use Schedulable;

    public function scheduleTest() {
        TestFacade::test();
    }
    public function scheduleTest2() {
        TestFacade::test();
    }
}
