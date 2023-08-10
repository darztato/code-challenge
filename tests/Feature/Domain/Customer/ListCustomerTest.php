<?php

declare(strict_types=1);

namespace Tests\Feature\Domain\Customer;

use App\Domain\Customer\Database\Factories\CustomerFactory;
use App\Domain\Customer\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\AbstractTestCase;

final class ListCustomerTest extends AbstractTestCase
{
    use RefreshDatabase;

    public function providesDataForListPerPage(): iterable
    {
        yield 'When no per page' => [
            30,
            15,
        ];

        yield 'When on Page 1' => [
            30,
            15,
            15,
            1,
        ];

        yield 'When all items in one page' => [
            30,
            30,
            30,
            1,
        ];

        yield 'When remaining items on the last page' => [
            32,
            2,
            15,
            3,
        ];

        yield 'When per_page only shows 1 item' => [
            30,
            1,
            1,
            3,
        ];
    }

    /**
     * @dataProvider providesDataForListPerPage
     */
    public function testListPerPage(int $count, int $expectedCount, ?int $perPage = null, ?int $page = null): void
    {
        CustomerFactory::new()
            ->count($count)
            ->createQuietly();

        $this
            ->getJson($this->getRoute([
                'page' => $page,
                'per_page' => $perPage,
            ]))
            ->assertOk()
            ->assertJsonCount($expectedCount, 'data')
            ->assertJsonStructure([
                'data',
                'links',
                'meta',
            ]);
    }

    public function getRoute(?array $parameters = null): string
    {
        return \route('customer::list', $parameters ?? []);
    }

    public function testSuccess(): void
    {
        CustomerFactory::new()
            ->count(30)
            ->createQuietly();

        $this
            ->getJson($this->getRoute())
            ->assertOk()
            ->assertJsonCount(15, 'data')
            ->assertJsonStructure([
                'data',
                'links',
                'meta',
            ]);

        $this->assertDatabaseCount(Customer::TABLE, 30);
    }
}
