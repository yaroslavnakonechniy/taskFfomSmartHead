<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <nav class="bg-blue-500 text-white p-4">
        <a href="{{ route('movies.index') }}" class="mr-4">Фильмы</a>
        <a href="{{ route('movies.create') }}" class="mr-4">Добавить фильм</a>
        <a href="{{ route('genres.index') }}">Жанры</a>
    </nav>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>

</body>
</html>