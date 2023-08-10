<?php

declare(strict_types=1);

namespace App\Domain\Customer\Controllers;

use App\Domain\Customer\Commands\UpdateCustomerCommand;
use App\Domain\Customer\Models\Customer;
use App\Domain\Customer\Requests\UpdateCustomerRequest;
use App\Http\Controllers\AbstractController;
use App\Http\Resources\GenericOnlyIdResource;
use Illuminate\Contracts\Support\Responsable;
use Spatie\EventSourcing\Commands\CommandBus;

final class UpdateCustomerController extends AbstractController
{
    public function __invoke(Customer $customer, CommandBus $commandBus, UpdateCustomerRequest $request): Responsable
    {
        $uuid = $customer->getUUID();
        
        $commandBus->dispatch(
            new UpdateCustomerCommand(
                $uuid,
                $request->getAttributes()
            )
        );

        return new GenericOnlyIdResource(\compact('uuid'));
    }
}
