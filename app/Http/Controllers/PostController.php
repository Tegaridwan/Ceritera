<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $query = Post::query();
        if (request('genre')) {
            $query->where('genre', request('genre'));
        }
        $posts = $query->latest()->get();
        // $posts = Post::where('user_id', Auth::id())->get();
        return view('posts.index', compact('posts'));
    }

    public function myPosts()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->get();
        return view('posts.ceritamu', compact('posts'));
    }

    public function author(User $user)
    {
        $posts = $user->posts;

        return view('posts.author', compact('user', 'posts'));
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
        $request->validate([
            'title' => 'required|max:255',
            'sinopsis' => 'required|max:500',
            'genres' => 'required|array|min:1',
            'genres.*' => 'string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'chapters' => 'required|array|min:1',
            'chapters.*.title' => 'required',
            'chapters.*.content' => 'required',
        ]);

        $status = 'privat';
        $isDraft = 1;

        if ($request->action === 'publish') {

            $status = 'publik';
            $isDraft = 0;
        }
        if ($request->action === 'draft') {

            $status = 'privat';
            $isDraft = 1;
        }

        $coverPath = null;

        if ($request->hasFile('cover')) {

            $coverPath = $request->file('cover')
                ->store('covers', 'public');
        }

        // dd($request->all());

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'cover' => $coverPath,
            'sinopsis' => $request->sinopsis,
            'genre' => $request->genres,
            'status' => $status,
            'is_draft' => $isDraft,
        ]);

        //perulangan karena chapter bisa banya
        foreach ($request->chapters as $index => $chapter) {

            Chapter::create([
                'post_id' => $post->id,
                'title' => $chapter['title'],
                'content' => $chapter['content'],
                'chapter_number' => $index + 1,
            ]);
        }

        return redirect()->route('posts.ceritamu');
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function read(Post $post, Chapter $chapter = null)
    {
        $chapters = $post->chapters;

        if (!$chapter || !$chapter->exists) {
            $chapter = $chapters->first();
        }

        $currentIndex = $chapters->search(function ($item) use ($chapter) {
            return $item->id === $chapter->id;
        });

        $prevChapter = $chapters[$currentIndex - 1] ?? null;
        $nextChapter = $chapters[$currentIndex + 1] ?? null;

        return view('posts.read', compact(
            'post',
            'chapter',
            'chapters',
            'prevChapter',
            'nextChapter'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Post $post)
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        return view('posts.edit', compact('post'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // hapus chapter lama
        $post->chapters()->delete();

        // simpan chapter baru
        if ($request->chapters) {

            foreach ($request->chapters as $chapter) {

                Chapter::create([
                    'post_id' => $post->id,
                    'title' => $chapter['title'],
                    'content' => $chapter['content'],
                ]);
            }
        }

        return redirect()->route('posts.ceritamu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // if ($post->user_id !== Auth::id()) {
        //     abort(403);
        // }
        // $post->delete();
        // return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
