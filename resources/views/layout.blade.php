<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Blog</title>
</head>
<body>
    <header>
        <h1>Laravel Blog</h1>
        <nav>
            <a href="{{ route('posts.index') }}">Home</a>
            {{-- <a href="{{ route('posts.create') }}">Tambah Post</a> --}}
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
