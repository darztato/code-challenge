<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\Interfaces\AppRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements AppRepositoryInterface
{
    private Model $model;

    abstract public function getModelClass(): string;

    /**
     * @param array<string, mixed> $data
     */
    public function createByRawAttributes(array $data): Model
    {
        return $this->newQueryBuilder()->create($data)->refresh();
    }

    public function findBy(string $column, ?string $value = null): ?Model
    {
        return $this->newQueryBuilder()
            ->where($column, '=', $value)
            ->first();
    }

    public function findOrFail(string $id): Model
    {
        return $this->newQueryBuilder()
            ->findOrFail($id);
    }

    public function isExists(string $id): bool
    {
        return $this->newQueryBuilder()
            ->where('id', '=', $id)
            ->exists();
    }

    public function isExistsByColumn(string $column, ?string $value = null): bool
    {
        return $this->newQueryBuilder()
            ->where($column, '=', $value)
            ->exists();
    }

    public function updateByRawAttributes(Model $model, array $data): Model
    {
        $model->update($data);
        $model->refresh();

        return $model;
    }

    protected function newQueryBuilder(): Builder // @phpstan-ignore-line
    {
        $this->model = $this->model ?? \resolve($this->getModelClass());

        return $this->model->writeable()->newQuery(); // @phpstan-ignore-line
    }
}
