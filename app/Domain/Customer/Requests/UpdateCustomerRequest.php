<?php

declare(strict_types=1);

namespace App\Domain\Customer\Requests;

use App\Domain\Customer\Models\Customer;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

final class UpdateCustomerRequest extends AbstractCustomerRequest
{
    /**
     * @return array<string, mixed>
     */
    public function getAttributes(): array
    {
        return Arr::whereNotNull([
            'city' => $this->getCity(),
            'country' => $this->getCountry(),
            'email' => $this->getEmail(),
            'first_name' => $this->getFirstName(),
            'id' => $this->getUuid(),
            'last_name' => $this->getLastName(),
            'gender' => $this->getGender(),
            'password' => $this->getPassword(),
            'phone' => $this->getPhone(),
            'username' => $this->getUsername(),
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        /** @var Customer $customerRoute */
        $customerRoute = $this->route('customer');

        return [
            'city' => [
                'string',
            ],
            'country' => [
                'string',
            ],
            'email' => [
                Rule::unique(Customer::TABLE, 'email')->ignoreModel($customerRoute),
                'email:filter',
            ],
            'first_name' => [
                'string',
            ],
            'uuid' => [
                'string',
                'uuid',
            ],
            'last_name' => [
                'string',
            ],
            'gender' => [
                'string',
            ],
            'password' => [
                'string',
            ],
            'phone' => [
                'string',
            ],
            'username' => [
                'string',
            ],
        ];
    }
}
