<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index() {
        $movies = Movie::with('genres')->paginate(10);
        return view('movies.index', compact('movies'));
    }

    public function create() {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'genres' => 'required|array'
        ]);

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        } else {
            $posterPath = 'default.jpg';
        }

        $movie = Movie::create([
            'title' => $request->title,
            'poster_url' => $posterPath,
            'is_published' => false,
        ]);

        $movie->genres()->attach($request->genres);

        return redirect()->route('movies.index')->with('success', 'Фильм добавлен!');
    }

    public function edit($id) {
        $movie = Movie::with('genres')->findOrFail($id);
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'genres' => 'required|array'
        ]);

        $movie = Movie::findOrFail($id);

        if ($request->hasFile('poster')) {
            Storage::disk('public')->delete($movie->poster_url);
            $posterPath = $request->file('poster')->store('posters', 'public');
        } else {
            $posterPath = $movie->poster_url;
        }

        $movie->update([
            'title' => $request->title,
            'poster_url' => $posterPath
        ]);

        $movie->genres()->sync($request->genres);

        return redirect()->route('movies.index')->with('success', 'Фильм обновлен!');
    }

    public function destroy($id) {
        $movie = Movie::findOrFail($id);
        Storage::disk('public')->delete($movie->poster_url);
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Фильм удален!');
    }

    public function publish($id) {
        $movie = Movie::findOrFail($id);
        $movie->update(['is_published' => true]);

        return redirect()->route('movies.index')->with('success', 'Фильм опубликован!');
    }
}
