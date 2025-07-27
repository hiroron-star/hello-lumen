<?php

namespace App\UseCases\Todo;

use App\Interfaces\TodoRepositoryInterface;
use App\Entities\Todo;

class GetTodoByIdUseCase
{
    protected TodoRepositoryInterface $repo;

    public function __construct(TodoRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function handle(int $id): ?Todo
    {
        return $this->repo->find($id);
    }
}
