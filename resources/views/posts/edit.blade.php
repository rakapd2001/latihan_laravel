@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title mb-4">Edit Post</h2>

            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Konten</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
