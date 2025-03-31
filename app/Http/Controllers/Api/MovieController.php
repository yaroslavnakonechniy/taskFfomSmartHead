<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index() {
        $movies = Movie::paginate(10);
        return MovieResource::collection($movies);
    }

    public function show($id) {
        $movie = Movie::with('genres')->findOrFail($id);
        return new MovieResource($movie);
    }
}
