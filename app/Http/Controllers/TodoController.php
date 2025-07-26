<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends BaseController
{
    // 一覧取得
    public function index()
    {
        return response()->json(Todo::all());
    }

    // 1件取得
    public function show($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($todo);
    }

    // 作成
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
        ]);

        $todo = Todo::create($request->only(['title', 'description', 'is_done']));
        return response()->json($todo, 201);
    }

    // 更新
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $todo->fill($request->only(['title', 'description', 'is_done']));
        $todo->save();

        return response()->json($todo);
    }

    // 削除
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $todo->delete();
        return response()->json(null, 204);
    }
}
