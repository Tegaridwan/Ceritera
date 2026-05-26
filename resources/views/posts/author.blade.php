@extends('layouts.main')
@section('content')

<!-- HALAMAN AUTHOR-->
<div class="p-8">
    {{-- PROFILE --}}
    <div class="flex items-center gap-6 mb-10">
        @if($user->photo)
            <img
                src="{{ asset('images/profile/' . $user->photo) }}"
                class="w-28 h-28 rounded-full object-cover border-4 border-[#8B5CF6]">
        @else
            <div class="w-28 h-28 rounded-full bg-gray-300"></div>
        @endif
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                {{ $user->name }}
            </h1>
            <p class="text-gray-500 mt-1">
                {{ $posts->count() }} Cerita
            </p>
        </div>
    </div>
    {{-- DAFTAR CERITA --}}
    <h2 class="text-2xl font-bold mb-6 text-[#8B5CF6]">
        Cerita Author
    </h2>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-5">
        @foreach($posts as $post)
            <a href="{{ route('posts.show', $post->id) }}" class="group">
                <div class="aspect-[2/3] overflow-hidden rounded-xl shadow">
                    <img
                        src="{{ asset('images/' . $post->cover) }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <h3 class="mt-2 text-sm font-semibold line-clamp-2">
                    {{ $post->title }}
                </h3>
            </a>
        @endforeach
    </div>
</div>
@endsection