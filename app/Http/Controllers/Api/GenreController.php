<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return response()->json($genres);
    }

    public function movies($id)
    {
        $genre = Genre::findOrFail($id);
        $movies = $genre->movies()->paginate(10);
        return response()->json($movies);
    }
}
