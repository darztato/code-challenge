<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class AbstractUpdateTestCase extends AbstractTestCase
{
    use RefreshDatabase;

    protected function getRoute(array $routeParam): string
    {
        return \route($this->getRouteName(), $routeParam);
    }

    abstract protected function getRouteName(): string;
}
