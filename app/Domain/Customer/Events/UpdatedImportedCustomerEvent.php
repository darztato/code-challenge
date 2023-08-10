<?php

declare(strict_types=1);

namespace App\Domain\Customer\Events;

use App\StoredEvents\AbstractStoredEvent;

final class UpdatedImportedCustomerEvent extends AbstractStoredEvent
{
    /**
     * @param  array<string, mixed>  $attributes
     */
    public function __construct(
        public readonly array $attributes,
    ) {
    }
}
