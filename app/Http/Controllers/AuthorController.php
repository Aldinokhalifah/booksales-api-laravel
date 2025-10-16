<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::all();

        return response()->json([
            "success" => true,
            "message" => "Get All Authors",
            "data" => $authors
        ], 200);
    }

    public function store(Request $request) {
        // Validasi Data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'bio' => 'required|string'
        ]);

        // Validasi Error
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // Upload Image
        $image = $request->file('photo');
        $image->store('authors', 'public');

        // Insert Data
        $author = Author::create([
            'name' => $request->name,
            'photo' => $image->hashName(),
            'bio' => $request->bio
        ]);

        return response()->json([
            "success" => true,
            "message" => "Resource Added Successfully",
            "data" => $author
        ], 201);
    }
}
