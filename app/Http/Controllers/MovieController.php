<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MovieRequest;

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

    public function store(MovieRequest $request) {

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster_url')->store('public');
        } else {
            $posterPath = 'default.png';
        }

        $movie = Movie::create([
            'title' => $request->title,
            'poster_url' => $posterPath,
            'is_published' => false,
        ]);

        $movie->genres()->attach($request->genres);

        return redirect()->route('movies.index')->with('success', 'Фільм додано!');
    }
    public function show($id) {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    }

    public function edit($id) {
        $movie = Movie::with('genres')->findOrFail($id);
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(MovieRequest $request, $id) {
        $movie = Movie::findOrFail($id);

        if ($request->hasFile('poster')) {
            Storage::disk('public')->delete($movie->poster_url);
            $posterPath = $request->file('poster_url')->store('public');
        } else {
            $posterPath = $movie->poster_url;
        }

        $movie->update([
            'title' => $request->title,
            'poster_url' => $posterPath
        ]);

        $movie->genres()->sync($request->genres);

        return redirect()->route('movies.index')->with('success', 'Фільм успішно оновлено!');
    }

    public function destroy($id) {
        $movie = Movie::findOrFail($id);
        Storage::disk('public')->delete($movie->poster_url);
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Фільм видалено!');
    }

    public function publish($id) {
        $movie = Movie::findOrFail($id);
        $movie->update(['is_published' => true]);

        return redirect()->back()->with('success', 'Фільм опубліковано!');
    }

    public function unpublish($id) {
        $movie = Movie::findOrFail($id);
        $movie->is_published = !$movie->is_published;
        $movie->save();

        return redirect()->back()->with('success', 'Статус публикації філма змінено.');
    }
}
