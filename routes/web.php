<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateUserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn() => Inertia::render('Login'));
Route::post('/', [AuthController::class, 'verifyLogin'])->name('verifyLogin');
Route::get('/register', fn() => Inertia::render('Register'));
Route::post('/register', [CreateUserController::class, 'createUser'])->name('createUser');
