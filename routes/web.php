<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes([
    'register' => false, // Registration Routes...
]);



Route::middleware(['auth'])->group(function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('main');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/tasks-view', [App\Http\Controllers\TaskController::class, 'index'])->middleware('can:tasks-show')->name('tasks-view'); // страница со списком всех задач
    Route::get('/task-add', [App\Http\Controllers\TaskController::class, 'taskAdd'])->middleware('can:tasks-add')->name('task-add'); // страница добавления новой задачи
    Route::post('/task-save', [App\Http\Controllers\TaskController::class, 'taskSave'])->middleware('can:tasks-add')->name('task-save'); // ссылка для сохранения новой задачи
    Route::get('/task-edit/{id}', [App\Http\Controllers\TaskController::class, 'taskEdit'])->middleware('can:tasks-edit')->name('task-edit'); // страница редактирования задачи
    Route::post('/task-delete/{id}', [App\Http\Controllers\TaskController::class, 'taskDelete'])->middleware('can:tasks-delete')->name('task-delete'); // ссылка для удаления задачи
    Route::post('/task-update/{id}', [App\Http\Controllers\TaskController::class, 'taskUpdate'])->middleware('can:tasks-edit')->name('task-update'); // ссылка для сохранения измененной задачи

    Route::get('/roles-view', [App\Http\Controllers\RoleController::class, 'index'])->middleware('can:roles-show')->name('roles-view'); // страница со списком всех ролей
    Route::get('/role-add', [App\Http\Controllers\RoleController::class, 'roleAdd'])->middleware('can:roles-add')->name('role-add'); // страница добавления новой роли
    Route::post('/role-save', [App\Http\Controllers\RoleController::class, 'roleSave'])->middleware('can:roles-add')->name('role-save'); // ссылка для сохранения новой роли
    Route::get('/role-edit/{id}', [App\Http\Controllers\RoleController::class, 'roleEdit'])->middleware('can:roles-edit')->name('role-edit'); // страница редактирования роли
    Route::post('/role-delete/{id}', [App\Http\Controllers\RoleController::class, 'roleDelete'])->middleware('can:roles-delete')->name('role-delete'); // ссылка для удаления роли
    Route::post('/role-update/{id}', [App\Http\Controllers\RoleController::class, 'roleUpdate'])->middleware('can:roles-edit')->name('role-update'); // ссылка для сохранения измененной роли

    Route::get('/users-view', [App\Http\Controllers\UserController::class, 'index'])->middleware('permission:users-show')->name('users-view'); // страница со списком всех пользователей
    Route::get('/user-add', [App\Http\Controllers\UserController::class, 'userAdd'])->middleware('can:users-add')->name('user-add'); // страница добавления нового пользователя
    Route::post('/user-save', [App\Http\Controllers\UserController::class, 'userSave'])->middleware('can:users-add')->name('user-save'); // ссылка для сохранения нового пользователя
    Route::get('/user-edit/{id}', [App\Http\Controllers\UserController::class, 'userEdit'])->middleware('can:users-edit')->name('user-edit'); // страница редактирования пользователя
    Route::post('/user-delete/{id}', [App\Http\Controllers\UserController::class, 'userDelete'])->middleware('can:users-delete')->name('user-delete'); // ссылка для удаления пользователя
    Route::post('/user-update/{id}', [App\Http\Controllers\UserController::class, 'userUpdate'])->middleware('can:users-edit')->name('user-update'); // ссылка для сохранения измененний пользователя
    Route::post('/user-create-token/{id}', [App\Http\Controllers\UserController::class, 'userCreateToken'])->middleware('can:users-edit')->name('user-create-token'); // ссылка для создания API токена пользователя
    Route::post('/user-update-token/{id}', [App\Http\Controllers\UserController::class, 'userUpdateToken'])->middleware('can:users-edit')->name('user-update-token'); // ссылка для обновления API токена пользователя
    Route::post('/user-delete-token/{id}', [App\Http\Controllers\UserController::class, 'userDeleteToken'])->middleware('can:users-edit')->name('user-delete-token'); // ссылка для удаления API токена пользователя

    Route::get('/positions-view', [App\Http\Controllers\PositionController::class, 'index'])->middleware('permission:positions-show')->name('positions-view'); // страница со списком всех должностей
    Route::get('/positions-add', [App\Http\Controllers\PositionController::class, 'positionAdd'])->middleware('can:positions-add')->name('position-add'); // страница добавления новой должности
    Route::post('/positions-save', [App\Http\Controllers\PositionController::class, 'positionSave'])->middleware('can:positions-add')->name('position-save'); // ссылка для сохранения нового должности
    Route::get('/positions-edit/{id}', [App\Http\Controllers\PositionController::class, 'positionEdit'])->middleware('can:positions-edit')->name('position-edit'); // страница редактирования должности
    Route::post('/positions-delete/{id}', [App\Http\Controllers\PositionController::class, 'positionDelete'])->middleware('can:positions-delete')->name('position-delete'); // ссылка для удаления должности
    Route::post('/positions-update/{id}', [App\Http\Controllers\PositionController::class, 'positionUpdate'])->middleware('can:positions-edit')->name('position-update'); // ссылка для сохранения измененний должности
});


