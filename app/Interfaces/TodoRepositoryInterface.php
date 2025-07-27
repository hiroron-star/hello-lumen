<?php

namespace App\Interfaces;

use App\Entities\Todo;

interface TodoRepositoryInterface
{
    public function create(array $data): Todo;
    public function getAll(): array;
    public function find(int $id): ?Todo;
    public function update(int $id, array $data): ?Todo;
    public function delete(int $id): bool;
}
