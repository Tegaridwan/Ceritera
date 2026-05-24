@extends('layouts.main')
@section('content')
<div class="max-w-5xl mx-auto p-8">
    <div class="grid md:grid-cols-3 gap-10">
        <!-- COVER -->
        <div>
            <img
                src="{{ asset('images/' . $post->cover) }}"
                class="w-full rounded-2xl shadow-lg object-cover"
            >
        </div>
        <!-- DETAIL -->
        <div class="md:col-span-2">
            <p class="text-sm text-[#3a8fba] font-semibold mb-2">
                {{ $post->genre }}
            </p>
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                {{ $post->title }}
            </h1>
            <p class="text-gray-500 mb-6">
                Oleh {{ $post->user->name }}
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
                class="inline-block bg-[#3a8fba] hover:bg-[#2f7397] text-white px-8 py-4 rounded-xl font-semibold transition">
                📖 Baca Cerita
            </a>
        </div>
    </div>
</div>
@endsection