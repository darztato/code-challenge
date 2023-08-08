<?php

declare(strict_types=1);

namespace App\Domain\Customer\Commands;

use App\Domain\Customer\Aggregates\CustomerAggregate;
use Spatie\EventSourcing\Commands\AggregateUuid;
use Spatie\EventSourcing\Commands\HandledBy;

#[HandledBy(CustomerAggregate::class)]
final class CreateCustomerCommand
{
    public function __construct(
        #[AggregateUuid] public readonly string $uuid,
        public readonly string $city,
        public readonly string $country,
        public readonly string $email,
        public readonly string $firstName,
        public readonly string $gender,
        public readonly string $lastName,
        public readonly string $password,
        public readonly string $phone,
        public readonly string $username,
    ) {
    }
}
