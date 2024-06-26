<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/users', 'App\Http\Controllers\UserController@list');
Route::post('/user/token', 'App\Http\Controllers\UserController@generateToken');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/tasks', 'App\Http\Controllers\TasksController@list');
    Route::post('/task', 'App\Http\Controllers\TasksController@create');
    Route::put('/task', 'App\Http\Controllers\TasksController@update');
    Route::delete('/task', 'App\Http\Controllers\TasksController@delete');
});
