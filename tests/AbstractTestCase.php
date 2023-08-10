<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Traits\CreatesApplicationTrait;

abstract class AbstractTestCase extends BaseTestCase
{
    use CreatesApplicationTrait;
}
