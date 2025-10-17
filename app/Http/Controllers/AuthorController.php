<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Pest\Mutate\Mutators\Visibility\FunctionProtectedToPrivate;

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

    public function show($id) {
        $author = Author::find($id);

        if(!$author) {
            return response()->json([
                "success" => false,
                "message" => "Author Not Found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get Detail Author",
            "data" => $author
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

    public function update(Request $request, $id) {
        $author = Author::find($id);

        if(!$author) {
            return response()->json([
                "success" => false,
                "message" => "Author Not Found",
            ], 404);
        }

        // Validasi Data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'bio' => 'required|string'
        ]);

        // Validasi Error
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

         // Siapkan Data
        $data = [
            'name' => $request->name,
            'bio' => $request->bio
        ];

        // Handle Image
        if($request->hasFile('photo')) {
            // Upload Image
            $image = $request->file('photo');
            $image->store('authors', 'public');

            if($author->photo) {
                Storage::disk('public')->delete('authors/' . $author->photo);
            }

            $data['photo'] = $image->hashName();
        }

        // Update Data
        $author->update($data);

        return response()->json([
            "success" => true,
            "message" => "Resource Updated Successfully",
            "data" => $author
        ], 200);
    }

    public Function destroy($id) {
        $author = Author::find($id);

        if(!$author) {
            return response()->json([
                "success" => false,
                "message" => "Author Not Found",
            ], 404);
        }

        if($author->photo) {
            Storage::disk('public')->delete('authors/' . $author->photo);
        }

        $author->delete();

        return response()->json([
            "success" => true,
            "message" => "Author ID: $id Deleted",
        ], 200);
    }
}
