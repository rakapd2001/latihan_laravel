@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title mb-4">Tambah Post</h2>

            <form action="{{ route('posts.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Isi Post</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Tulis isi postingan" rows="5" required>{{ old('content') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
