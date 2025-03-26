@extends('layout')

@section('content')
    <h2>Edit Post</h2>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $post->title }}" required>
        <textarea name="content" required>{{ $post->content }}</textarea>
        <button type="submit">Update</button>
    </form>
@endsection
