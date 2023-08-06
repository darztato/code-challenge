<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\UuidTrait;
use DateTimeInterface;
use Spatie\EventSourcing\Projections\Projection;

abstract class AbstractProjection extends Projection
{
    use UuidTrait;

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->getAttribute($this->getCreatedAtColumn());
    }

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->getAttribute($this->getUpdatedAtColumn());
    }
}
