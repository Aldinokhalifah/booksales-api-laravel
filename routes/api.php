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
Route::apiResource('/genre', GenreController::class);

// Author
Route::apiResource('/author', AuthorController::class);

// Book
Route::apiResource('/book', BookController::class);