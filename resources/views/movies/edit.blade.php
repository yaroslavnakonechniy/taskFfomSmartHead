@extends('layouts.app')

@section('title', 'Редактировать фильм')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Редактировать фильм</h1>
    

    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
        @csrf
        @method('PUT')

        <label class="block mb-2">Название фильма</label>
        <input type="text" name="title" value="{{ $movie->title }}" class="border p-2 w-full mb-4" required>

        <label class="block mb-2">Текущий постер</label>
        <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="Постер" class="w-32 h-48 object-cover mb-4">

        <label class="block mb-2">Загрузить новый постер</label>
        <input type="file" name="poster_url" class="border p-2 w-full mb-4">

        <label for="genres">Жанри:</label>
        <select name="genres[]" multiple>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ $movie->genres->contains($genre->id) ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Сохранить</button>
    </form>
@endsection
