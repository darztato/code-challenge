<?php

declare(strict_types=1);

namespace App\Domain\Customer\Controllers;

use App\Api\RandomUserApi;
use App\Domain\Customer\Commands\CreateImportedCustomerCommand;
use App\Domain\Customer\Commands\UpdateImportedCustomerCommand;
use App\Domain\Customer\Models\Customer;
use App\Domain\Customer\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Http\Controllers\AbstractController;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use Spatie\EventSourcing\Commands\CommandBus;

final class ImportCustomerController extends AbstractController
{
    public function __invoke(
        CommandBus $commandBus,
        RandomUserApi $randomUserApi,
        CustomerRepositoryInterface $customerRepository
    ): Responsable {
        $users = $randomUserApi->getUser();

        foreach ($users->results as $user) {
            $emailExists = $customerRepository->isExistsByColumn(Customer::EMAIL_COLUMN, $user->email);
            $location = $user->location;
            $login = $user->login;
            $name = $user->name;
            if (!$emailExists) {
                $commandBus->dispatch(
                    new CreateImportedCustomerCommand(
                        $login->uuid,
                        $location->city,
                        $location->country,
                        $user->email,
                        $name->first,
                        $user->gender,
                        $name->last,
                        $login->md5,
                        $user->phone,
                        $login->username
                    )
                );
            } else {
                $commandBus->dispatch(
                    new UpdateImportedCustomerCommand(
                        $login->uuid,
                        Arr::whereNotNull([
                            Customer::CITY_COLUMN => $location->city,
                            Customer::COUNTRY_COLUMN => $location->country,
                            Customer::EMAIL_COLUMN => $user->email,
                            Customer::FIRST_NAME_COLUMN => $name->first,
                            Customer::UUID_COLUMN => $login->uuid,
                            Customer::LAST_NAME_COLUMN => $name->last,
                            Customer::GENDER_COLUMN => $user->gender,
                            Customer::PASSWORD_COLUMN => $login->md5,
                            Customer::PHONE_COLUMN => $user->phone,
                            Customer::USERNAME_COLUMN => $login->username,
                        ])
                    )
                );
            }
        }

        return new JsonResource(['message' => 'success']);
    }
}
