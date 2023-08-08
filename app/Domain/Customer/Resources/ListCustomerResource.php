<?php

declare(strict_types=1);

namespace App\Domain\Customer\Resources;

use App\Http\Resources\AbstractResource;

/**
 * @mixin \App\Domain\Customer\Models\Customer
 */
class ListCustomerResource extends AbstractResource
{
    /**
     * @param \Illuminate\Http\Request|null $request
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'email' => $this->getEmail(),
            'full_name' => $this->getFullName(),
            'country' => $this->getCountry()
        ];
    }

    public function getFullName(): string
    {
        $format = '%s %s';

        return \sprintf($format, $this->getFirstName(), $this->getLastName());
    }
}
