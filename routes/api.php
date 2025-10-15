<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/genre', [GenreController::class, 'index']);
Route::get('/author', [AuthorController::class, 'index']);
Route::get('/book', [BookController::class, 'index']);