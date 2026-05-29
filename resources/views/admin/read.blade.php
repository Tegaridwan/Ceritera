<!-- HALAMAN READ POST ADMIN -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Ceritera</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#C8D8F8] min-h-screen">

    <!-- HEADER -->
    <div class="bg-[#1A0A3C] px-8 py-5 flex justify-between items-center">

        <a href="{{ route('admin.index') }}"
            class="text-[#C4B5FD] hover:text-white font-semibold">
            ← Kembali Dashboard
        </a>

        <!-- BUTTON HAPUS -->
        <form
            action="{{ route('admin.posts.destroy', $post->id) }}"
            method="POST"
            onsubmit="return confirm('Hapus cerita ini?')">
            @csrf
            @method('DELETE')
            <button
                class="bg-red-600 hover:bg-red-700
                text-white px-5 py-2 rounded-xl font-semibold">
                🗑 Hapus Cerita
            </button>
        </form>
    </div>
    <div class="max-w-5xl mx-auto px-6 py-8">
        <!-- INFO -->
        <div class="bg-white rounded-3xl shadow p-8 mb-6">
            <div class="flex gap-6">
                <img
                    src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('images/default-cover.jpg') }}"
                    class="w-40 h-56 object-cover rounded-2xl">
                <div class="flex-1">
                    <h1 class="text-4xl font-bold text-[#1A0A3C] mb-3">
                        {{ $post->title }}
                    </h1>
                    <p class="text-gray-500 mb-2">
                        oleh <span class="font-semibold">
                            {{ $post->user->name }}
                        </span>
                    </p>
                    <span
                        class="inline-block bg-[#4B2CA0]
                        text-white text-sm px-4 py-1 rounded-full mb-2">
                        {{ implode(', ', $post->genre ?? []) }}
                    </span>
                    <p class="text-gray-700 leading-7">
                        {{ $post->sinopsis }}
                    </p>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-[#F3F0FF] rounded-2xl p-4">
                            <p class="text-sm text-gray-500">
                                Total Chapter
                            </p>
                            <p class="text-2xl font-bold text-[#4B2CA0]">
                                {{ $post->chapters->count() }}
                            </p>
                        </div>
                        <div class="bg-[#F3F0FF] rounded-2xl p-4">
                            <p class="text-sm text-gray-500">
                                Views
                            </p>
                            <p class="text-2xl font-bold text-[#4B2CA0]">
                                {{ $post->views ?? 0 }}
                            </p>
                        </div>
                        <div class="bg-[#F3F0FF] rounded-2xl p-4">
                            <p class="text-sm text-gray-500">
                                Diposting
                            </p>
                            <p class="text-lg font-bold text-[#4B2CA0]">
                                {{ $post->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CHAPTER -->
        <div class="space-y-6">
            @foreach($post->chapters as $chapter)
            <div class="bg-white rounded-3xl shadow p-8">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <p class="text-sm text-[#7C4DCC] font-semibold">
                            Chapter {{ $chapter->chapter_number }}
                        </p>
                        <h2 class="text-2xl font-bold text-[#1A0A3C]">
                            {{ $chapter->title }}
                        </h2>
                    </div>
                </div>
                <div class="leading-9 text-gray-700 whitespace-pre-line">
                    {{ $chapter->content }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>