<?php

declare(strict_types=1);

namespace App\Domain\Customer\Requests;

use App\Domain\Customer\Models\Customer;
use Illuminate\Validation\Rule;

final class CreateCustomerRequest extends AbstractCustomerRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'city' => [
                'required',
                'string',
            ],
            'country' => [
                'required',
                'string',
            ],
            'email' => [
                Rule::unique(Customer::TABLE, 'email'),
                'email:filter',
                'required',
            ],
            'first_name' => [
                'required',
                'string',
            ],
            'uuid' => [
                'required',
                'string',
                'uuid',
            ],
            'last_name' => [
                'required',
                'string',
            ],
            'gender' => [
                'required',
                'string',
            ],
            'password' => [
                'required',
                'string',
            ],
            'phone' => [
                'required',
                'string',
            ],
            'username' => [
                'required',
                'string',
            ],
            
        ];
    }
}
