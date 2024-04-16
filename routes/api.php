<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\TaskController;


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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Регистрация пользователя
//Route::post('/user-register', [AuthController::class, 'register']);

// Авторизация пользователя
Route::post('/user-login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group( function() {



    // Задачи
    Route::get('/tasks-view', [TaskController::class, 'index'])->name('tasks-view'); // страница со списком всех задач;

});


// Запись должен быть последней. Возвращает json если введен несуществуюшей url для api
Route::any('{path}', function() {
    return response()->json([
        'success' => false,
        'message' => 'Route not found'
    ], 404);
})->where('path', '.*');
