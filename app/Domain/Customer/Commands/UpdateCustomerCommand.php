<?php

declare(strict_types=1);

namespace App\Domain\Customer\Commands;

use App\Domain\Customer\Aggregates\CustomerAggregate;
use Spatie\EventSourcing\Commands\AggregateUuid;
use Spatie\EventSourcing\Commands\HandledBy;

#[HandledBy(CustomerAggregate::class)]
final class UpdateCustomerCommand
{
    /**
     * @param array<string, mixed> $attributes
     */
    public function __construct(
        #[AggregateUuid] public readonly string $uuid,
        public readonly array $attributes
    ) {
    }
}
