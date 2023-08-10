<?php

declare(strict_types=1);

namespace App\Domain\Customer\Projectors;

use App\Domain\Customer\Events\UpdatedCustomerEvent;
use App\Domain\Customer\Models\Customer;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

final class UpdatedCustomerProjector extends Projector
{
    /**
     * @throws \Throwable
     */
    public function __invoke(UpdatedCustomerEvent $event): void
    {
        /** @var \App\Domain\Customer\Models\Customer $customer */
        $customer = Customer::where('uuid', $event->aggregateRootUuid())->firstOrFail();

        $customer
            ->writeable()
            ->updateOrFail($event->attributes);
    }
}
