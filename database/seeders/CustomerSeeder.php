<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Customer\Database\Factories\CustomerFactory;
use Illuminate\Database\Seeder;

final class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        CustomerFactory::new()->count(100)->createQuietly();
    }
}
