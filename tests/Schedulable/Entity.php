<?php

namespace berthott\Schedulable\Tests\Schedulable;

use berthott\Schedulable\Models\Traits\Schedulable;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use Schedulable;
}
