<?php

declare(strict_types=1);

namespace App\Domain\Customer\Controllers;

use App\Domain\Customer\Commands\CreateCustomerCommand;
use App\Domain\Customer\Requests\CreateCustomerRequest;
use App\Http\Controllers\AbstractController;
use App\Http\Resources\CreateOnlyIdResource;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Str;
use Spatie\EventSourcing\Commands\CommandBus;

final class CreateCustomerController extends AbstractController
{
    public function __invoke(CommandBus $commandBus, CreateCustomerRequest $request): Responsable
    {
        $uuid = $request->getUuid() ?? Str::uuid()->toString();

        $commandBus->dispatch(
            new CreateCustomerCommand(
                $uuid,
                $request->getCity(),
                $request->getCountry(),
                $request->getEmail(),
                $request->getFirstName(),
                $request->getGender(),
                $request->getLastName(),
                $request->getPassword(),
                $request->getPhone(),
                $request->getUsername()
            )
        );

        return new CreateOnlyIdResource(\compact('uuid'));
    }
}
