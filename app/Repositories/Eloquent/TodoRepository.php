<?php

namespace App\Repositories\Eloquent;

use App\Models\Todo as EloquentTodo;
use App\Entities\Todo;
use App\Interfaces\TodoRepositoryInterface;

class TodoRepository implements TodoRepositoryInterface
{
    public function create(array $data): Todo
    {
        $model = EloquentTodo::create($data);

        return new Todo(
            $model->id,
            $model->title,
            $model->description,
            $model->is_done
        );
    }
}
