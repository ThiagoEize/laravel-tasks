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


Route::get('/tasks', 'App\Http\Controllers\TasksController@list')->middleware(['auth:sanctum']);
Route::post('/task', 'App\Http\Controllers\TasksController@create')->middleware(['auth:sanctum']);
Route::put('/task', 'App\Http\Controllers\TasksController@update')->middleware(['auth:sanctum']);
Route::delete('/task', 'App\Http\Controllers\TasksController@delete')->middleware(['auth:sanctum']);
