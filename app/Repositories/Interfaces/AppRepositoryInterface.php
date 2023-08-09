<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface AppRepositoryInterface
{
    /**
     * @param array<string, mixed> $data
     */
    public function createByRawAttributes(array $data): Model;

    public function findBy(string $column, ?string $value = null): ?Model;

    public function findOrFail(string $id): Model;

    public function isExists(string $id): bool;

    public function isExistsByColumn(string $column, ?string $value = null): bool;

    /**
     * @param array<string, mixed> $data
     */
    public function updateByRawAttributes(Model $model, array $data): Model;
}
