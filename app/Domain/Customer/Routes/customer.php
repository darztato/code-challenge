<?php

declare(strict_types=1);

use App\Domain\Customer\Controllers\CreateCustomerController;
use App\Domain\Customer\Controllers\ImportCustomerController;
use App\Domain\Customer\Controllers\ListCustomerController;
use App\Domain\Customer\Controllers\ReadCustomerController;
use App\Domain\Customer\Controllers\UpdateCustomerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/customer')
    ->middleware(['api'])
    ->name('customer::')
    ->group(function () {
        Route::get('/', ListCustomerController::class)
            ->name('list');
        Route::get('/{customer}', ReadCustomerController::class)
            ->name('read')
            ->whereUuid('customer');
        Route::patch('/{customer}', UpdateCustomerController::class)
            ->name('update')
            ->whereUuid('customer');
        Route::post('/', CreateCustomerController::class)
            ->name('create');
        Route::post('/import', ImportCustomerController::class)
            ->name('import');
    });
