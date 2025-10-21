<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\TransactionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:api'])->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Transaction
    Route::apiResource('/transaction', TransactionController::class)->only(['show', 'update', 'store']);

    Route::middleware(['role:admin'])->group(function() {
        // Genre
        Route::apiResource('/genre', GenreController::class)->only(['store', 'update', 'destroy']);
    
        // Author
        Route::apiResource('/author', AuthorController::class)->only(['store', 'update', 'destroy']);
        
        // Transaction
        Route::apiResource('/transaction', TransactionController::class)->only(['index', 'destroy']);
    });
});

// Genre
Route::apiResource('/genre', GenreController::class)->only(['index', 'show']);

// Author
Route::apiResource('/author', AuthorController::class)->only(['index', 'show']);

// Book
Route::apiResource('/book', BookController::class);

