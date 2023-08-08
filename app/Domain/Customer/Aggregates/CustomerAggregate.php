<?php

declare(strict_types=1);

namespace App\Domain\Customer\Aggregates;

use App\Domain\Customer\Commands\CreateCustomerCommand;
use App\Domain\Customer\Commands\UpdateCustomerCommand;
use App\Domain\Customer\Events\CreatedCustomerEvent;
use App\Domain\Customer\Events\UpdatedCustomerEvent;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

final class CustomerAggregate extends AggregateRoot
{
    public function create(CreateCustomerCommand $command): self
    {
        $this->recordThat(
            new CreatedCustomerEvent(
                $command->city,
                $command->country,
                $command->email,
                $command->firstName,
                $command->gender,
                $command->lastName,
                $command->password,
                $command->phone,
                $command->username
            )
        );

        return $this;
    }

    public function update(UpdateCustomerCommand $command): self
    {
        $this->recordThat(new UpdatedCustomerEvent(
            $command->attributes,
        ));

        return $this;
    }
}
