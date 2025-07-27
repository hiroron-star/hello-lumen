<?php

namespace App\UseCases\Todo;

use App\Interfaces\TodoRepositoryInterface;

class DeleteTodoUseCase
{
    protected TodoRepositoryInterface $repo;

    public function __construct(TodoRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function handle(int $id): bool
    {
        return $this->repo->delete($id);
    }
}
