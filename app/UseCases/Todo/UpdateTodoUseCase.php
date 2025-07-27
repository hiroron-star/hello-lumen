<?php

namespace App\UseCases\Todo;

use App\Interfaces\TodoRepositoryInterface;
use App\Entities\Todo;

class UpdateTodoUseCase
{
    protected TodoRepositoryInterface $repo;

    public function __construct(TodoRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function handle(int $id, array $data): ?Todo
    {
        return $this->repo->update($id, $data);
    }
}
