@extends('layouts.main')

@section('content')

<div class="flex flex-col">
    <div class="p-6">
        <div class="items-center mb-8">
            <div class="flex items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Selamat Datang,</h1>
                <p class="font-bold ml-2 text-3xl text-[#3a8fba]">{{ Auth::user()->name }}</p>
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-800">Rekomendasi untukmu</h1>
            </div>
        </div>
    </div>
</div>
<!-- <h1>Data Posts</h1>
     <div class="py-6">
        <a href="/posts/create" class="text-blue-500">Tambah</a>

        <div class="mt-4">
            @foreach ($posts as $post)
                <div class="p-4 mb-3 bg-white shadow rounded">
                    <h3 class="font-bold">{{ $post->title }}</h3>
                    <p>{{ $post->content }}</p>

                    <div class="mt-2">
                        <a href="/posts/{{ $post->id }}/edit" class="text-yellow-500">Edit</a>

                        <form action="/posts/{{ $post->id }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div> -->
@endsection