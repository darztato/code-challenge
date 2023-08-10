<?php

declare(strict_types=1);

namespace App\Domain\Customer\Controllers;

use App\Domain\Customer\Models\Customer;
use App\Domain\Customer\Resources\ListCustomerResource;
use App\Http\Controllers\AbstractController;
use App\Http\Requests\PerPageQueryRequest;
use Illuminate\Contracts\Support\Responsable;

final class ListCustomerController extends AbstractController
{
    public function __invoke(PerPageQueryRequest $request): Responsable
    {
        return ListCustomerResource::collection(
            Customer::query()
                ->latest('updated_at')
                ->paginate($request->getPerPage())
                ->appends($request->query())
        );
    }
}
