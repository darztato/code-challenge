<?php

declare(strict_types=1);

namespace App\Domain\Customer\Projectors;

use App\Domain\Customer\Events\UpdatedCustomerEvent;
use App\Domain\Customer\Events\UpdatedImportedCustomerEvent;
use App\Domain\Customer\Models\Customer;
use Illuminate\Support\Arr;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

final class UpdatedImportedCustomerProjector extends Projector
{
    /**
     * @throws \Throwable
     */
    public function __invoke(UpdatedImportedCustomerEvent $event): void
    {
        /** @var \App\Domain\Customer\Models\Customer $customer */
        $customer = Customer::where('email', Arr::get($event->attributes, 'email'))->firstOrFail();

        $customer
            ->writeable()
            ->updateOrFail($event->attributes);
    }
}
