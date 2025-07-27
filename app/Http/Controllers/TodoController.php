<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\TodoRepository;
use App\UseCases\Todo\CreateTodoUseCase;
use App\UseCases\Todo\GetTodoListUseCase;
use App\UseCases\Todo\GetTodoByIdUseCase;
use App\UseCases\Todo\UpdateTodoUseCase;
use App\UseCases\Todo\DeleteTodoUseCase;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->only(['title', 'description', 'completed']);

        $useCase = new CreateTodoUseCase(new TodoRepository());
        $todo = $useCase->handle($data);

        return response()->json($todo, 201);
    }
    public function index()
{
    $useCase = new GetTodoListUseCase(new TodoRepository());
    return response()->json($useCase->handle());
}

    public function show($id)
{
    $useCase = new GetTodoByIdUseCase(new TodoRepository());
    $todo = $useCase->handle((int) $id);

    if (!$todo) {
        return response()->json(['message' => 'Not Found'], 404);
    }

    return response()->json($todo);
}
    public function update(Request $request, $id)
{
    $data = $request->only(['title', 'description', 'completed']);
    $useCase = new UpdateTodoUseCase(new TodoRepository());

    $todo = $useCase->handle((int)$id, $data);

    if (!$todo) {
        return response()->json(['message' => 'Not Found'], 404);
    }

    return response()->json($todo);
}
    public function destroy($id)
{
    $useCase = new DeleteTodoUseCase(new TodoRepository());
    $success = $useCase->handle((int)$id);

    if (!$success) {
        return response()->json(['message' => 'Not Found'], 404);
    }

    return response()->json(null, 204);
}
}
