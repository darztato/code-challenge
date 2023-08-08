<?php

declare(strict_types=1);

namespace App\Domain\Customer\Events;

use App\StoredEvents\AbstractStoredEvent;

final class CreatedCustomerEvent extends AbstractStoredEvent
{
    public function __construct(
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
