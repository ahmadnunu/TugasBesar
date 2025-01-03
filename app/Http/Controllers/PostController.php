<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
        return view('posts.index', compact('posts', 'trending', 'suggestions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }
        $user = Auth::user();

        // Simpan postingan ke database
        Post::create([
            'user_name' => $user->name, // Gunakan nama pengguna dari Auth
            'user_id' => $user->id,
            'timestamp' => now(),
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $post->image = $request->file('image')->store('posts', 'public');
        }

        // Update data postingan
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $post->image,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('posts.index')->with('success', 'Postingan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        // Hapus gambar jika ada
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        // Hapus postingan
        $post->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dihapus!');
    }
}
