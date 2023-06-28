<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\TodoController::class, 'index'])->name('todo.index');
Route::get('/create', [\App\Http\Controllers\TodoController::class, 'create'])->name('todo.create');
Route::post('/store', [\App\Http\Controllers\TodoController::class, 'store'])->name('todo.store');
Route::get('/{todoId}/edit', [\App\Http\Controllers\TodoController::class, 'edit'])->name('todo.edit');
Route::put('/{todoId}', [\App\Http\Controllers\TodoController::class, 'update'])->name('todo.update');
