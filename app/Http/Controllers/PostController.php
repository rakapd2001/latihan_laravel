<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('posts.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan.');
    }

    // Menampilkan detail data
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Menampilkan form edit
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Mengupdate data
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus.');
    }
}
