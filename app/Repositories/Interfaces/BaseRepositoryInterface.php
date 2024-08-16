<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface BaseRepositoryInterface
{
    public function all(): Collection;

    public function find(int|string $id): ?object;

    public function create(array $data): object;

    public function update(int|string $id, array $data): ?object;

    public function delete(int|string $id): bool;
}
