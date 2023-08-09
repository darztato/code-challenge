<?php

declare(strict_types=1);

namespace App\Domain\Customer\Database\Factories;

use App\Domain\Customer\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domain\Customer\Models\Customer>
 */
final class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city' => \fake()->city,
            'country' => \fake()->country,
            'email' => \fake()->unique()->email,
            'first_name' => \fake()->firstName,
            'gender' => 'male',
            'last_name' => \fake()->lastName,
            'phone' => \fake()->phoneNumber,
            'password' => \fake()->password,
            'username' => \fake()->userName,
            'uuid' => \fake()->unique()->uuid,
        ];
    }

    public function whenSoftDeleted(): self
    {
        return $this->state(fn() => ['deleted_at' => $this->faker->dateTime]);
    }
}
