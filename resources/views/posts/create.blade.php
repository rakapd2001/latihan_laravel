@extends('layout')

@section('content')
    <h2>Tambah Post</h2>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Judul" required>
        <textarea name="content" placeholder="Isi Post" required></textarea>
        <button type="submit">Simpan</button>
    </form>
@endsection
