<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Genre
Route::get('/genre', [GenreController::class, 'index']);
Route::post('/genre', [GenreController::class, 'store']);

// Author
Route::get('/author', [AuthorController::class, 'index']);
Route::post('/author', [AuthorController::class, 'store']);

// Book
Route::get('/book', [BookController::class, 'index']);