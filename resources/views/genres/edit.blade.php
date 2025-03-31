@extends('layouts.app')

@section('title', 'Редактировать жанр')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Редактировать жанр</h1>

    <form action="{{ route('genres.update', $genre->id) }}" method="POST" class="bg-white p-4 rounded shadow">
        @csrf
        @method('PUT')
        <label class="block mb-2">Название жанра</label>
        <input type="text" name="name" value="{{ $genre->name }}" class="border p-2 w-full mb-4" required>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Сохранить</button>
    </form>
@endsection
