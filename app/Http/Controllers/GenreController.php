<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::all();

        return response()->json([
            "success" => true,
            "message" => "Get All Genres",
            "data" => $genres
        ], 200);
    }

    public function store(Request $request) {
        // Validasi Data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'description' => 'required|string'
        ]);

        // Validasi Error
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // Insert Data
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            "success" => true,
            "message" => "Resource Added Successfully",
            "data" => $genre
        ], 201);
    }
}
