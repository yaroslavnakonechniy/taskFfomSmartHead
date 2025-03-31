@extends('layouts.app')

@section('title', 'Список фильмов')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Список фильмов</h1>
    <a href="{{ route('movies.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Добавить фильм</a>

    <ul class="mt-4">
        @foreach($movies as $movie)
            <li class="border p-4 mb-2 bg-white rounded">
                <h3 class="text-lg font-semibold">{{ $movie->title }}</h3>
                <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="Постер" class="w-32 h-48 object-cover">
                <p class="card-text">
                            <strong>Жанри:</strong> 
                            @foreach($movie->genres as $genre)
                                {{ $genre->name }}{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        </p>
                <p>{{ $movie->is_published ? '✅ Опубликован' : '❌ Не опубликован' }}</p>
                <a href="{{ route('movies.show', $movie->id) }}" class="text-blue-500">Подробнее</a>
            </li>
        @endforeach
    </ul>

    <div class="mt-4">
        {{ $movies->links() }}
    </div>
@endsection
