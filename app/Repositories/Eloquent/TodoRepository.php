<?php

namespace App\Repositories\Eloquent;

use App\Models\Todo as EloquentTodo;
use App\Entities\Todo;
use App\Interfaces\TodoRepositoryInterface;

class TodoRepository implements TodoRepositoryInterface
{
    public function create(array $data): Todo
    {
        $model = EloquentTodo::create([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'completed' => $data['completed'] ?? false,
        ]);

        return new Todo(
            $model->id,
            $model->title,
            $model->description,
            $model->completed
        );
    }
    public function getAll(): array
{
    return EloquentTodo::all()->map(function ($model) {
        return new Todo(
            $model->id,
            $model->title,
            $model->description,
            $model->completed
        );
    })->toArray();
}

    public function find(int $id): ?Todo
{
    $model = EloquentTodo::find($id);
    if (!$model) return null;

    return new Todo(
        $model->id,
        $model->title,
        $model->description,
        $model->completed
    );
}

    public function update(int $id, array $data): ?Todo
{
    $model = EloquentTodo::find($id);
    if (!$model) return null;

    $model->fill($data);
    $model->save();

    return new Todo(
        $model->id,
        $model->title,
        $model->description,
        $model->completed
    );
}
    public function delete(int $id): bool
{
    $model = EloquentTodo::find($id);
    if (!$model) return false;

    return $model->delete();
}
}
