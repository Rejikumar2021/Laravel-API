<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('/create-user', [CreateUserController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'index'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'getUser']);
    Route::post('/category', [ProductCategoryController::class, 'createCategory']);
    Route::get('/categories', [ProductCategoryController::class, 'getAllCategories']);
    Route::get('/categories/{id}', [ProductCategoryController::class, 'getCategoryItem']);
    Route::put('/categories/{id}', [ProductCategoryController::class, 'updateCategory']);
    Route::delete('/categories/{id}', [ProductCategoryController::class, 'deleteCategory']);
    Route::post('/product', [ProductController::class, 'createProduct']);
    Route::post('product/{id}/gallery', [ProductController::class, 'createProductGallery']);
    Route::get('/products', [ProductController::class, 'getAllProducts']);
});
