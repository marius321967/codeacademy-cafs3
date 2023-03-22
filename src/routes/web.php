<?php

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/greet', [GreetingController::class, 'greetDefault']);
Route::get('/greet/{name}', [GreetingController::class, 'greetName']);

Route::get('/tasks', [TaskController::class, 'list']);
Route::post('/tasks', [TaskController::class, 'create']);
