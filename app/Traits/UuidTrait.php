<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method static Builder uuid(string $uuid)
 */
trait UuidTrait
{
    public function getRouteKey(): string
    {
        return $this->getUUID();
    }

    public function getUUID(): string
    {
        return $this->getAttribute($this->uuidColumn());
    }

    public function uuidColumn(): string
    {
        return 'id';
    }

    public function getRouteKeyName(): string
    {
        return $this->uuidColumn();
    }

    /**
     * @phpstan-param  \Illuminate\Database\Eloquent\Builder<self> $query
     *
     * @phpstan-return \Illuminate\Database\Eloquent\Builder<self>
     */
    public function scopeUuid(Builder $query, string $uuid): Builder
    {
        return $query->where($this->uuidColumn(), '=', $uuid);
    }

    public function setUUID(string $uuid): self
    {
        $this->setAttribute($this->uuidColumn(), $uuid);

        return $this;
    }
}
