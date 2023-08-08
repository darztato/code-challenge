<?php

declare(strict_types=1);

namespace App\Domain\Customer\Projectors;

use App\Domain\Customer\Events\CreatedCustomerEvent;
use App\Domain\Customer\Models\Customer;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

final class CreatedCustomerProjector extends Projector
{
    public function __invoke(CreatedCustomerEvent $event): void
    {
        $customer = Customer::new()->writeable();
        $customer->setCity($event->city);
        $customer->setCountry($event->country);
        $customer->setEmail($event->email);
        $customer->setFirstName($event->firstName);
        $customer->setUuid($event->aggregateRootUuid());
        $customer->setLastName($event->lastName);
        $customer->setGender($event->gender);
        $customer->setPassword($event->password);
        $customer->setPhone($event->phone);
        $customer->setUserName($event->username);

        $customer->save();
    }
}