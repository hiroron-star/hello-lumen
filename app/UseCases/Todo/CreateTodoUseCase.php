<?php

namespace App\UseCases\Todo;

use App\Interfaces\TodoRepositoryInterface;
use App\Entities\Todo;

class CreateTodoUseCase
{
    protected TodoRepositoryInterface $repo;

    public function __construct(TodoRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function handle(array $input): Todo
    {
        return $this->repo->create($input);
    }
}
