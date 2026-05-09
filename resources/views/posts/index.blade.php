@extends('layouts.main')

@section('content')

<div class="flex flex-col">
    <div class="p-6">
        <!-- Header -->
        <div class="items-center mb-8">
            <div class="flex items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Selamat Datang,</h1>
                <p class="font-bold ml-2 text-3xl text-[#3a8fba]">{{ Auth::user()->name }}</p>
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-800">Rekomendasi untukmu</h1>
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
            @foreach ($posts as $post)

            <a href="/posts/{{ $post->id }}" class="group block">
                <div class="w-full h-64 bg-gray-200 rounded-xl overflow-hidden shadow-md">
                    <img src="{{ asset('images/' . $post->cover) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <h2 class="mt-4 text-lg font-semibold text-gray-800 group-hover:text-[#3a8fba] transition-colors duration-200">{{ $post->title }}</h2>
                <p class="text-sm text-gray-500">{{ $post->user->name }}</p>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection