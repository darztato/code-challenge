<?php

declare(strict_types=1);

namespace App\Providers;

use App\Domain\Customer\Repositories\CustomerRepository;
use App\Domain\Customer\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

final class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CustomerRepositoryInterface::class,
            CustomerRepository::class
        );
    }
}
