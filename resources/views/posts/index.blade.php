@extends('layout')

@section('content')
    <h2>Daftar Post</h2>
    <a href="{{ route('posts.create') }}">Tambah Post</a>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
