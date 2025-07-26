<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function echo(Request $request)
    {
        $rules = [
            'message' => 'required|min:3|max:20'
        ];
        $this->validate($request, $rules);
        return response()->json([
            'received' => $request->input('message')
        ]);
    }
}
