<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/create', [UserController::class, 'create'])->name('create');
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::delete('/destroy/{index}', [UserController::class, 'destroy'])->name('destroy');
