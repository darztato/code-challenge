<?php

declare(strict_types=1);

namespace App\Domain\Customer\Repositories;

use App\Domain\Customer\Models\Customer;
use App\Domain\Customer\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\AbstractRepository;


final class CustomerRepository extends AbstractRepository implements CustomerRepositoryInterface
{
    public function getModelClass(): string
    {
        return Customer::class;
    }
}
