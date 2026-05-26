<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $posts = Post::with('user', 'chapters')->get();
        return view('admin.index', compact('users', 'posts'));
    }

    public function read($id)
    {
        $post = Post::with('user', 'chapters')->findOrFail($id);

        return view('admin.read', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->chapters()->delete();
        $post->delete();
        return redirect()
            ->route('admin.index')
            ->with('success', 'Cerita berhasil dihapus');
    }
}
