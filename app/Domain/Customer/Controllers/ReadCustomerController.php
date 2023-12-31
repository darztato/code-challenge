<?php

declare(strict_types=1);

namespace App\Domain\Customer\Controllers;


use App\Domain\Customer\Models\Customer;
use App\Domain\Customer\Resources\ReadCustomerResource;
use App\Http\Controllers\AbstractController;
use Illuminate\Contracts\Support\Responsable;

final class ReadCustomerController extends AbstractController
{
    public function __invoke(Customer $customer): Responsable
    {
        return new ReadCustomerResource($customer);
    }
}
