<?php

declare(strict_types=1);

namespace Tests\Feature\Domain\Customer;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\AbstractTestCase;

final class CreateCustomerTest extends AbstractTestCase
{
    use RefreshDatabase;

    /**
     * @return iterable<string, mixed>
     *
     * @see CreateCustomerTest::testSuccessfulCreationOfCustomer
     */
    public function providesDataForSuccessfulCreationOfCustomer(): iterable
    {
        $faker = Factory::create();

        yield 'With all required fields are provided' => [
            [
                'city' => $faker->city,
                'country' => $faker->country,
                'email' => $faker->unique()->email,
                'first_name' => $faker->firstName,
                'gender' => 'male',
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'password' => $faker->password,
                'username' => $faker->userName,
            ],
        ];

        yield 'With UUID provided' => [
            [
                'city' => $faker->city,
                'country' => $faker->country,
                'email' => $faker->unique()->email,
                'first_name' => $faker->firstName,
                'gender' => 'male',
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'password' => $faker->password,
                'username' => $faker->userName,
                'uuid' => $faker->unique()->uuid,
            ],
        ];
    }

    /**
     * @dataProvider providesDataForSuccessfulCreationOfCustomer
     *
     * @param array<string, string> $inputData
     */
    public function testSuccessfulCreationOfCustomer(array $inputData): void
    {
        $this
            ->postJson(\route('customer::create'), $inputData)
            ->assertCreated();
    }
}
