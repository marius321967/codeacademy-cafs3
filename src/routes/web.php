<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\GreetingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegistrationController::class, 'register']);

Route::get('/greet', [GreetingController::class, 'greetDefault']);
Route::get('/greet/{name}', [GreetingController::class, 'greetName']);

Route::middleware([
  // 'auth'
  // ApiAuthMiddleware::class,
])->group(function () {
  Route::get('/tasks', [TaskController::class, 'list']);
  Route::get('/tasks/user/{id}', [TaskController::class, 'listUsersTasks']);
  Route::get('/tasks/completed', [TaskController::class, 'listAllCompleted']);
  Route::post('/tasks', [TaskController::class, 'create']);
  Route::get('/tasks/{id}', [TaskController::class, 'find'])->whereNumber('id');
  Route::post('/tasks/{id}', [TaskController::class, 'update'])->whereNumber('id');
  Route::delete('/tasks/{id}', [TaskController::class, 'delete'])->whereNumber('id');
});

Route::middleware([
  Authenticate::class
])->group(function () {
  Route::get('/auth/me', [AuthController::class, 'me']);

  Route::post('/profile/avatar', [AvatarController::class, 'upload']);
});

Route::middleware(['admin'])->group(function () {
  Route::get('/users', [UserController::class, 'list']);
});

Route::get('/exchange-rates', [ExchangeController::class, 'index']);

Route::get('/users/{id}/avatar', [AvatarController::class, 'getAvatar']);
