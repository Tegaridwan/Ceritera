@extends('layouts.main')

@section('content')

<div class="flex flex-col">
    <div class="p-6">
        <!-- Header -->
        <div class="items-center mb-16">
            <div class=" flexitems-center text-center mb-8">
                <h1 class="text-6xl font-bold  bg-gradient-to-r from-[#8B5CF6] to-[#1E1147] bg-clip-text text-transparent">Temukan & Bagikan</h1>
                <h1 class="text-6xl font-bold  bg-gradient-to-r from-[#8B5CF6] to-[#1E1147] bg-clip-text text-transparent">Cerita Terbaikmu</h1>
                <br>
                <p class=" ml-2 text-xl text-[#000000]">Ribuan cerita menunggu untuk dibaca.</p>
                <p class=" ml-2 text-xl text-[#000000]">Tulis imajinasimu, temukan pengarang favoritmu.</p>
            </div>
        </div>
        <div class="mb-6">
            <h1 class="text-xl font-bold bg-gradient-to-r from-[#8B5CF6] to-[#1E1147] bg-clip-text text-transparent">Rekomendasi untukmu</h1>
        </div>
        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-7 gap-4">

            @foreach ($posts as $post)

            <a href="/posts/{{ $post->id }}" class="group block">
                <div class="aspect-[2/3] overflow-hidden rounded-lg bg-gray-200 shadow-sm">
                    <img src="{{ asset('images/' . $post->cover) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="mt-2">
                    <h2 class="text-sm font-semibold text-gray-800 line-clamp-2 leading-snug group-hover:text-[#8B5CF6] transition">{{ $post->title }}</h2>
                    <p class="mt-1 text-xs text-gray-500 truncate">{{ $post->user->name }}</p>
                </div>

            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection