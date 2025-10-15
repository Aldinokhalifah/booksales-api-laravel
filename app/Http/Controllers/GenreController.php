<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() {
        $data = new Genre();
        $genres = $data->getGenres();

        return response()->json([
            "success" => true,
            "message" => "Get All Genres",
            "data" => $genres
        ], 200);
    }
}
