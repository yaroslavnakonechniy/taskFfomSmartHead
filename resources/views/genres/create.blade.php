@extends('layouts.app')

@section('title', 'Добавить жанр')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Добавить жанр</h1>

    <form action="{{ route('genres.store') }}" method="POST" class="bg-white p-4 rounded shadow">
        @csrf
        <label class="block mb-2">Название жанра</label>
        <input type="text" name="name" class="border p-2 w-full mb-4" required>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Добавить</button>
    </form>
@endsection
