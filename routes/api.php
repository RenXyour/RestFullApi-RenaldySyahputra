<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//resource Product 
Route::get('products/search', [ProductController::class, 'searchByName']); 
Route::get('products', [ProductController::class, 'index']); 
Route::apiResource('products', ProductController::class)->except(['index']); 
Route::delete('products/{id}', [ProductController::class, 'destroy']);

// register, login, dan logout
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum'); // Endpoint logout dengan middleware sanctum
Route::get('users', [AuthController::class, 'getAllUsers']);