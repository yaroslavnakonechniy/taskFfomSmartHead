<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Http\Requests\GenreRequest;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    public function create() {
        return view('genres.create');
    }

    public function store(GenreRequest $request) {
        Genre::create($request->all());
        return redirect()->route('genres.index')->with('success', 'Жанр успішно створено.');
    }

    public function edit(Genre $genre) {
        return view('genres.edit', compact('genre'));
    }

    public function update(GenreRequest $request, Genre $genre) {
        $genre->update($request->all());
        return redirect()->route('genres.index')->with('success', 'Жанр успішно оновлено.');
    }

    public function destroy(Genre $genre) {
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Жанр успішно видалено.');
    }
}
