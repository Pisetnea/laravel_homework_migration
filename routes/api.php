<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/categories',[CategoryController::class,'index']);
// Route::post('/categories',[CategoryController::class,'store']);
// Route::get('/categories/{id}',[CategoryController::class,'show']);
// Route::put('/categories/{id}',[CategoryController::class,'update']);
// Route::delete('/categories/{id}',[CategoryController::class,'destroy']);


Route::apiResource('categories',CategoryController::class)
->names([
    'index'=>'api.categories.index',
    'store'=>'api.categories.store',
    'show'=>'api.categories.show',
    'update'=>'api.categories.update',
    'destroy'=>'api.categories.destroy',
]);

Route::apiResource('products',\App\Http\Controllers\Api\ProductController::class)
->names([
    'index'=>'api.products.index',
    'store'=>'api.products.store',
    'show'=>'api.products.show',
    'update'=>'api.products.update',
    'destroy'=>'api.products.destroy',
]);