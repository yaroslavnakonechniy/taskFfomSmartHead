@extends('layouts.app')

@section('title', $movie->title)

@section('content')
    <h1 class="text-2xl font-bold">{{ $movie->title }}</h1>
    <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="Постер" class="w-64 h-96 object-cover mb-4">
    <p>{{ $movie->is_published ? '✅ Опубликован' : '❌ Не опубликован' }}</p>
    @if($movie->is_published)
        <form action="{{ route('movies.unpublish', $movie->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PATCH')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Снять с публикации</button>
        </form>
    @else
        <form action="{{ route('movies.publish', $movie->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PATCH')
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Опубликовать</button>
        </form>
    @endif

    <a href="{{ route('movies.edit', $movie->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block">Редактировать</a>

    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Удалить</button>
    </form>
@endsection
