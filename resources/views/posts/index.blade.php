{{-- {{ dd($posts) }} --}}

@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Daftar Post</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Tambah Post</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($posts->count())
        <div class="list-group">
            @foreach ($posts as $post)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('posts.show', $post->id) }}" class="fw-bold text-decoration-none">
                            {{ $post->title }}
                        </a>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            Belum ada postingan.
        </div>
    @endif
@endsection
