@extends('layouts.app')

@section('title', 'Добавить фильм')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Добавить фильм</h1>

    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
        @csrf
        <label class="block mb-2">Название фильма</label>
        <input type="text" name="title" class="border p-2 w-full mb-4" required>

        <label class="block mb-2">Постер</label>
        <input type="file" name="poster_url" class="border p-2 w-full mb-4">

        <label for="genres">Жанри:</label>
        <select name="genres[]" multiple>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Добавить</button>
    </form>
@endsection
