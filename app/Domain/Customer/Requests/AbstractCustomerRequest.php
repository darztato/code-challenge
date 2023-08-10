<?php

declare(strict_types=1);

namespace App\Domain\Customer\Requests;

use App\Http\Requests\AbstractFormRequest;

abstract class AbstractCustomerRequest extends AbstractFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function getCity(): ?string
    {
        return $this->validated('city');
    }

    public function getCountry(): ?string
    {
        return $this->validated('country');
    }

    public function getEmail(): ?string
    {
        return $this->validated('email');
    }

    public function getFirstName(): ?string
    {
        return $this->validated('first_name');
    }

    public function getGender(): ?string
    {
        return $this->validated('gender');
    }

    public function getUuid(): ?string
    {
        return $this->validated('uuid');
    }

    public function getLastName(): ?string
    {
        return $this->validated('last_name');
    }

    public function getPassword(): ?string
    {
        return $this->validated('password');
    }

    public function getPhone(): ?string
    {
        return $this->validated('phone');
    }

    public function getUsername(): ?string
    {
        return $this->validated('username');
    }
}
