<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/products', [ProductController::class, 'index']);          // List all products
Route::post('/products', [ProductController::class, 'store']);         // Create new product
Route::get('/products{id}', [ProductController::class, 'show']);       // Show single product
Route::put('/products{id}', [ProductController::class, 'update']);     // Update product
Route::delete('/products{id}', [ProductController::class, 'destroy']); 

Route::get('/categories', [CategoryController::class, 'index']);         // List all categories
Route::post('/categories', [CategoryController::class, 'store']);        // Create new category
Route::get('/categories{id}', [CategoryController::class, 'show']);      // Show single category
Route::put('/categories{id}', [CategoryController::class, 'update']);    // Update category
Route::delete('/categories{id}', [CategoryController::class, 'destroy']);