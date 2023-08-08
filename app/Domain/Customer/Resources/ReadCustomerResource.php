<?php

declare(strict_types=1);

namespace App\Domain\Applicant\Resources;

use App\Domain\Customer\Resources\ListCustomerResource;

final class ReadCustomerResource extends ListCustomerResource
{
    /**
     * @param  \Illuminate\Http\Request|null  $request
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return \array_merge(parent::toArray($request), [
            'city' => $this->getCity(),
            'gender' => $this->getGender(),
            'phone' => $this->getPhone(),
            'username' => $this->getUsername(),
        ]);
    }
}
