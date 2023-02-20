<?php

namespace berthott\Schedulable\Services;

use berthott\Schedulable\Models\Traits\Schedulable;
use berthott\Targetable\Services\TargetableService;

class SchedulableService extends TargetableService
{
    /**
     * The Constructor.
     */
    public function __construct()
    {
        parent::__construct(Schedulable::class, 'schedulable');
    }
}
