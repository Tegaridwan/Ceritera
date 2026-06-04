<!-- HALAMAN HOME-->

@extends('layouts.main')

@section('content')
    <div class="flex flex-col">
        <div class="p-6">
            <!-- Header -->
            <div class="items-center mb-16">
                <div class=" flexitems-center text-center mb-8">
                    <h1
                        class="text-6xl font-bold  bg-gradient-to-r from-[#8B5CF6] to-[#1E1147] bg-clip-text text-transparent">
                        Temukan & Bagikan</h1>
                    <h1
                        class="text-6xl font-bold  bg-gradient-to-r from-[#8B5CF6] to-[#1E1147] bg-clip-text text-transparent">
                        Cerita Terbaikmu</h1>
                    <br>
                    <p class=" ml-2 text-xl text-[#000000]">Ribuan cerita menunggu untuk dibaca.</p>
                    <p class=" ml-2 text-xl text-[#000000]">Tulis imajinasimu, temukan pengarang favoritmu.</p>
                </div>
            </div>
            <div class="mb-6">
                <h1 class="text-xl font-bold bg-gradient-to-r from-[#8B5CF6] to-[#1E1147] bg-clip-text text-transparent">
                    Rekomendasi untukmu</h1>
            </div>
            <div class="flex flex-wrap gap-3 mb-8">

                <a href="/posts"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
        {{ request('genre') == null ? 'bg-[#8B5CF6] text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' }}">
                    Semua
                </a>

                <a href="/posts?genre=romance"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
        {{ request('genre') == 'romance' ? 'bg-pink-500 text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' }}">
                    Romance
                </a>

                <a href="/posts?genre=horor"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
        {{ request('genre') == 'horor' ? 'bg-red-500 text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' }}">
                    Horor
                </a>

                <a href="/posts?genre=fantasi"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
        {{ request('genre') == 'fantasi' ? 'bg-purple-500 text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' }}">
                    Fantasi
                </a>

                <a href="/posts?genre=misteri"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
        {{ request('genre') == 'misteri' ? 'bg-blue-500 text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' }}">
                    Misteri
                </a>

                <a href="/posts?genre=drama"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
        {{ request('genre') == 'drama' ? 'bg-yellow-500 text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' }}">
                    Drama
                </a>

                <a href="/posts?genre=aksi"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
        {{ request('genre') == 'aksi' ? 'bg-orange-600 text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' }}">
                    Aksi
                </a>

                <a href="/posts?genre=komedi"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
        {{ request('genre') == 'komedi' ? 'bg-green-600 text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' }}">
                    Komedi
                </a>

                <a href="/posts?genre=thriller"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
        {{ request('genre') == 'thriller' ? 'bg-red-700 text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' }}">
                    Thriller
                </a>

            </div>
            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-7 gap-4">

                @foreach ($posts as $post)
                    <div class="group block">
                        <a href="/posts/{{ $post->id }}" class="block">
                            <div class="aspect-[2/3] overflow-hidden rounded-lg bg-gray-200 shadow-sm">
                                <img src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('images/default-cover.jpg') }}"
                                    alt="{{ $post->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <div class="mt-2">
                                <h2
                                    class="text-sm font-semibold text-gray-800 line-clamp-2 leading-snug transition group-hover:text-[#8B5CF6]">
                                    {{ $post->title }}
                                </h2>
                            </div>
                        </a>
                        <p class="mt-1 text-xs text-gray-500 truncate">
                            <a href="{{ route('author.profile', $post->user->id) }}"
                                class="text-xs text-gray-500 hover:text-[#8B5CF6] relative z-10">
                                {{ $post->user->name }}
                            </a>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
