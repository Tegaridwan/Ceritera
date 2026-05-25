@extends('layouts.main')
@section('content')
<div class="max-w-5xl mx-auto p-8">
    <div class="grid md:grid-cols-3 gap-10">
        <!-- COVER -->
        <div>
            <img
                src="{{ asset('images/' . $post->cover) }}"
                class="w-full rounded-2xl shadow-lg object-cover">
        </div>
        <!-- DETAIL -->
        <div class="md:col-span-2">
            <div>
                <p class="text-sm text-[#3a8fba] font-semibold mb-2">
                    {{ $post->genre }}
                </p>
            </div>

            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                {{ $post->title }}
            </h1>
            <p class="text-gray-500 mb-6">
                Oleh <a
                    href="{{ route('author.profile', $post->user->id) }}"
                    class="text-xl text-black font-bold hover:text-[#8B5CF6]">

                    {{ $post->user->name }}

                </a>
            </p>
            <div class="bg-white rounded-2xl shadow p-6 mb-6">
                <h2 class="font-bold text-lg mb-3">
                    Sinopsis
                </h2>
                <p class="text-gray-700 leading-8">
                    {{ $post->sinopsis }}
                </p>
            </div>
            <a href="/posts/{{ $post->id }}/read"
                class="inline-block bg-[#402988] hover:bg-[#3713a4] text-white px-8 py-4 rounded-xl font-semibold transition">
                📖 Baca Cerita
            </a>
            <div class="bg-white rounded-2xl shadow p-6 mt-5">

                <h2 class="text-xl font-bold mb-5">
                    Daftar Chapter
                </h2>

                <div class="flex flex-col gap-3">

                    @forelse($post->chapters as $chapter)

                    <a
                        href="{{ route('posts.read', [$post->id, $chapter->id]) }}"
                        class="flex items-center justify-between border rounded-xl px-5 py-4 hover:bg-[#f3f0ff] transition">

                        <div>

                            <p class="font-semibold text-gray-800">
                                {{ $chapter->title }}
                            </p>

                            <p class="text-sm text-gray-500">
                                Chapter {{ $loop->iteration }}
                            </p>

                        </div>

                        <span class="text-[#7c3aed] font-bold">
                            →
                        </span>

                    </a>

                    @empty

                    <div class="text-gray-500">
                        Belum ada chapter.
                    </div>

                    @endforelse

                </div>

            </div>

        </div>
    </div>
</div>
@endsection