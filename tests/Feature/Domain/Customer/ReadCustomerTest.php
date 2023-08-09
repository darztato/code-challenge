<?php

declare(strict_types=1);

namespace Tests\Feature\Domain\Customer;

use App\Domain\Customer\Database\Factories\CustomerFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\AbstractTestCase;

final class ReadCustomerTest extends AbstractTestCase
{
    use RefreshDatabase;

    public function testSoftDeletedCustomer(): void
    {
        /** @var \App\Domain\Customer\Models\Customer $customer */
        $customer = CustomerFactory::new()
            ->whenSoftDeleted()
            ->createQuietly();

        $this
            ->getJson($this->getRoute($customer->getUUID()))
            ->assertNotFound();
    }

    public function getRoute(string $customer): string
    {
        return \route('customer::read', \compact('customer'));
    }

    public function testNewlyCreatedCustomer(): void
    {
        $customer = CustomerFactory::new()
            ->createQuietly();

        $this
            ->getJson($this->getRoute($customer->getUUID()))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'email',
                    'full_name',
                    'country',
                    'city',
                    'gender',
                    'phone',
                    'username',
                ],
            ])
            ->assertJson(static function (AssertableJson $json) {
                $json->has('data');

                return $json;
            })
            ->assertJsonPath('data.email', $customer->getEmail())
            ->assertJsonMissing([
                'data' => [
                    'deleted_at',
                ],
            ]);
    }
}
