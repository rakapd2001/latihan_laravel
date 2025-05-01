@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">← Kembali ke Daftar Post</a>
        </div>
    </div>
@endsection
