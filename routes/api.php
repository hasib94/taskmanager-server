<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
  Route::post('register', 'AuthController@register');
  Route::post('login', 'AuthController@login');
  Route::post('logout', 'AuthController@logout');
  Route::post('me', 'AuthController@me');
});


// TODO: PREFIX 
Route::post('/task/add', 'TaskController@addTask');
Route::get('/tasks', 'TaskController@getTasks');
Route::post('/task/delete', 'TaskController@deleteTask');
Route::post('/task/edit', 'TaskController@editTask');
Route::post('/task/done', 'TaskController@completeTask');
Route::get('/task/get/{id}', 'TaskController@getTask');
