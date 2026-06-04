<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/user', function () {
//     return view('user');
// });
// Route::get('/customers', function () {
//     return ;
// });

Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');
Route::get('/customers', [CustomerController::class, 'index'])
    ->name('customers.index');
Route::get('/users/{id}', [UserController::class, 'show'])
    ->name('users.show')
    ->where('id', '[0-9]+');
Route::get('/users/{name}/{email}', [UserController::class, 'getUsernameEmail'])
    ->name('users.email');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])
    ->name('categories.create');
Route::post('/categories', [App\Http\Controllers\CategoryController::class, 'store'])
    ->name('categories.store');
Route::get('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])
    ->name('categories.edit');
Route::put('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'update'])
    ->name('categories.update');
Route::delete('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])
    ->name('categories.destroy');

    
Route::get('/movies', [App\Http\Controllers\MovieController::class, 'index'])->name('movies.index');
