<?php

declare(strict_types=1);

namespace Tests\Feature\Domain\Customer;

use App\Domain\Customer\Database\Factories\CustomerFactory;
use App\Domain\Customer\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\AbstractTestCase;

final class UpdateCustomerTest extends AbstractTestCase
{
    use RefreshDatabase;

    public function getRoute(string $customer): string
    {
        return route('customer::update', \compact('customer'));
    }

    /**
     * @return iterable<string, mixed>
     *
     * @see UpdateCustomerTest::testUpdateCustomer
     */
    public function providesDataForUpdateCustomer(): iterable
    {
        yield 'With City changed' => [
            [
                'city' => 'old city',
            ],
            [
                'city' => 'new city',
            ],
        ];

        yield 'With Country changed' => [
            [
                'country' => 'old country',
            ],
            [
                'country' => 'new country',
            ],
        ];

        yield 'With Email changed' => [
            [
                'email' => 'old@email.com',
            ],
            [
                'email' => 'new@email.com',
            ],
        ];

        yield 'With First Name changed' => [
            [
                'first_name' => 'old first name',
            ],
            [
                'first_name' => 'new first name',
            ],
        ];

        yield 'With Gender changed' => [
            [
                'gender' => 'male',
            ],
            [
                'first_name' => 'female',
            ],
        ];

        yield 'With Last Name changed' => [
            [
                'last_name' => 'old last name',
            ],
            [
                'last_name' => 'new last name',
            ],
        ];

        yield 'With Phone changed' => [
            [
                'phone' => '12312312312',
            ],
            [
                'phone' => '32131232132',
            ],
        ];

        yield 'With Password changed' => [
            [
                'password' => 'old password',
            ],
            [
                'password' => 'new password',
            ],
        ];

        yield 'With Username changed' => [
            [
                'username' => 'old username',
            ],
            [
                'username' => 'old username',
            ],
        ];
    }

    public function testNotFoundCustomer(): void
    {
        $this
            ->patchJson($this->getRoute('non-existing-customer'))
            ->assertNotFound();
    }

    /**
     * @dataProvider providesDataForUpdateCustomer
     *
     * @param  array<string, string>  $oldAttributes
     * @param  array<string, string>  $newAttributes
     */
    public function testUpdateCustomer(array $oldAttributes, array $newAttributes): void
    {
        /** @var \App\Domain\Customer\Models\Customer $customer */
        $customer = CustomerFactory::new($oldAttributes)
            ->createQuietly();

        $this
            ->patchJson(
                $this->getRoute($customer->getUUID()),
                $newAttributes
            )
            ->assertOk();

        $this->assertDatabaseHas(Customer::TABLE, $newAttributes);
    }
}
