<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () {
    return response()->json(['message' => 'Hello Lumen']);
});

// $router->post('/echo', function (\Illuminate\Http\Request $request) {
//     return response()->json([
//         'received' => $request->input('message')
//     ]);
// });

$router->post('/echo', 'ExampleController@echo');

// $router->group(['prefix' => 'todos'], function () use ($router) {
//     $router->get('/', 'TodoController@index');
//     $router->get('{id}', 'TodoController@show');
//     $router->post('/', 'TodoController@store');
//     $router->put('{id}', 'TodoController@update');
//     $router->delete('{id}', 'TodoController@destroy');
// });

$router->post('/todos', 'TodoController@store');
$router->get('/todos', 'TodoController@index');
$router->get('/todos/{id}', 'TodoController@show');
$router->put('/todos/{id}', 'TodoController@update');
$router->delete('/todos/{id}', 'TodoController@destroy');

