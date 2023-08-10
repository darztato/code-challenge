<?php

declare(strict_types=1);

namespace App\Domain\Customer\Aggregates;

use App\Domain\Customer\Commands\CreateCustomerCommand;
use App\Domain\Customer\Commands\CreateImportedCustomerCommand;
use App\Domain\Customer\Commands\UpdateCustomerCommand;
use App\Domain\Customer\Commands\UpdateImportedCustomer;
use App\Domain\Customer\Events\CreatedCustomerEvent;
use App\Domain\Customer\Events\CreatedImportedCustomerEvent;
use App\Domain\Customer\Events\UpdatedCustomerEvent;
use App\Domain\Customer\Events\UpdatedImportedCustomerEvent;
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

    public function createImport(CreateImportedCustomerCommand $command): self
    {
        $this->recordThat(
            new CreatedImportedCustomerEvent(
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

    public function updateImport(UpdateImportedCustomer $command): self
    {
        $this->recordThat(new UpdatedImportedCustomerEvent(
            $command->attributes,
        ));

        return $this;
    }
}
