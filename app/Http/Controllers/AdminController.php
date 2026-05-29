<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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

        // hapus cover dari storage
        if ($post->cover && Storage::disk('public')->exists('covers/' . $post->cover)) {

            Storage::disk('public')->delete('covers/' . $post->cover);
        }

        $post->delete();

        return redirect()
            ->route('admin.index')
            ->with('success', 'Cerita berhasil dihapus');
    }
    public function destroyUser(User $user)
    {
        //logic ben gaiso hapus awakdewe
        if ($user->id === auth()->user()->id) {

            return redirect()
                ->route('admin.index')
                ->with('error', 'Tidak bisa menghapus akun sendiri');
        }

        foreach ($user->posts as $post) {

            $post->chapters()->delete();
        }

        // jika user memiliki post dan dihapus maka semua post akan dihapus
        $user->posts()->delete();


        $user->delete();

        return redirect()
            ->route('admin.index')
            ->with('success', 'User berhasil dihapus');
    }
}
