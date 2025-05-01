<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Blog</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: Tambah custom CSS jika perlu -->
    <style>
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body>

    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">Laravel Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Home</a>
                    </li>
                    {{-- 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.create') }}">Tambah Post</a>
                    </li>
                    --}}
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- Bootstrap Bundle (dengan Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
