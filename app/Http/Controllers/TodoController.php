<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\TodoRepository;
use App\UseCases\Todo\CreateTodoUseCase;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->only(['title', 'description', 'is_done']);

        $useCase = new CreateTodoUseCase(new TodoRepository());
        $todo = $useCase->handle($data);

        return response()->json($todo, 201);
    }
}
