<?php

use Illuminate\Http\Request;
use Modules\Books\Http\Controllers\Api\BooksController;
use Modules\Books\Http\Controllers\Api\CategoriaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/books', [BooksController::class, 'index']);
Route::post('/books', [BooksController::class, 'store']);
Route::put('/books/{id}/update', [BooksController::class, 'update']);
Route::delete('/books/{id}/destroy', [BooksController::class, 'destroy']);
Route::get('/books/{id}', [BooksController::class, 'show']);


Route::post('/categories', [CategoriaController::class, 'store']);
