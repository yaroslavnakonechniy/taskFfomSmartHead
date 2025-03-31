@extends('layouts.app')

@section('title', 'Жанры')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Список жанров</h1>
    
    <a href="{{ route('genres.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Добавить жанр</a>

    <ul>
        @foreach($genres as $genre)
            <li class="border p-4 mb-2 bg-white rounded flex justify-between items-center">
                <span class="text-lg font-semibold">{{ $genre->name }}</span>
                <div>
                    <a href="{{ route('genres.edit', $genre->id) }}" class="text-blue-500 mr-2">Редактировать</a>

                    <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Удалить</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
