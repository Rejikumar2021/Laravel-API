<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateUserController;
use Illuminate\Support\Facades\Route;

Route::post('/create-user', [CreateUserController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'index']);
