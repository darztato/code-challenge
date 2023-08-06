<?php

declare(strict_types=1);

namespace App\Filters;

use Illuminate\Contracts\Database\Eloquent\Builder;

interface FilterInterface
{
    public function __invoke(Builder $builder): void;
}
