<?php

declare(strict_types=1);

namespace Tests\Feature\Domain\Customer;

use App\Api\RandomUserApi;
use App\Domain\Customer\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ImportCustomerTest extends TestCase
{
    use RefreshDatabase; // To reset the database after each test
    use WithFaker; // To generate fake data

    /** @test */
    public function it_imports_customers_from_api()
    {
        // Mock the RandomUserApi class
        $randomUserApiMock = $this->createMock(RandomUserApi::class);

        // Set up a fake response for the getUser method
        $fakeResponse = (object) [
            'results' => [
                (object) [
                    'email' => 'test@example.com',
                    'location' => (object) [
                        'city' => 'Test City',
                        'country' => 'Test Country',
                    ],
                    'login' => (object) [
                        'uuid' => 'fake-uuid',
                        'md5' => 'fake-md5',
                        'username' => 'fake-username',
                    ],
                    'name' => (object) [
                        'first' => 'John',
                        'last' => 'Doe',
                    ],
                    'gender' => 'male',
                    'phone' => '1234567890',
                ],
            ],
        ];

        $randomUserApiMock->expects($this->once())
            ->method('getUser')
            ->willReturn($fakeResponse);

        // Replace the resolved instance of RandomUserApi with our mock
        $this->app->instance(RandomUserApi::class, $randomUserApiMock);

        // Perform the API import by hitting the controller endpoint
        $response = $this->postJson(route('customer::import'));

        // Assert that the response indicates success
        $response->assertOk();

        // Assert that a customer was created in the database
        $this->assertDatabaseCount(Customer::class, 1); // Or adjust the count as needed

        // Assert that the customer data matches the imported data
        $this->assertDatabaseHas(Customer::class, [
            'email' => 'test@example.com',
            'city' => 'Test City',
            'country' => 'Test Country',
        ]);
    }
}
