<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tulis Cerita — Ceritera</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        textarea {
            resize: vertical;
        }

        select {
            appearance: none;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-[#C4B5FD] from-[16%] to-[#DDD6FE] to-[92%] min-h-screen bg-fixed bg-no-repeat">
    <div class="bg-[#402988] px-5 py-4 flex items-center gap-3 shadow-md">

        <span onclick="window.location.href='{{ route('posts.ceritamu') }}';"
            class="text-[15px] text-[#90b8cc] font-medium cursor-pointer hover:text-white transition">
            ← Beranda
        </span>
        <span class="text-[#4a7a9a] text-[15px]">|</span>
        <span class="text-[#cce4f0] text-[15px] font-semibold">
            Tulis
        </span>

    </div>

    <div class="max-w-[780px] mx-auto px-5 pt-6 pb-[70px]">

        <div class="flex items-center gap-3 mb-6">
            <span class="text-[28px]">✍️</span>
            <h1 class="text-[28px] font-bold text-[#1b2e3e]">
                <span class="text-[#402988]">Edit Cerita</span>
            </h1>
        </div>

        <form id="edit-story-form" action="{{ route('posts.update', $post->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-[#DDD6FE] rounded-2xl p-6 mb-5 shadow-lg">
                <div class="text-[11px] font-bold tracking-[2px] uppercase text-black mb-5">
                    Informasi Cerita
                </div>
                <div class="flex flex-col sm:flex-row gap-5 items-start">

                    <div id="cover-box"
                        class="w-[140px] h-[180px] rounded-xl bg-white border-2 border-dashed border-[#3d6f90] flex flex-col items-center justify-center cursor-pointer flex-shrink-0 relative overflow-hidden transition-all duration-200 hover:border-[#5aabd0] hover:bg-[#2d5070]">
                        <input type="file" name="cover" accept="image/*" onchange="previewCover(event)"
                            class="absolute inset-0 opacity-0 cursor-pointer">

                        @if (!empty($post->cover))
                            <img id="cover-preview" src="{{ asset('storage/' . $post->cover) }}"
                                class="w-full h-full object-cover block" alt="cover">
                            <div id="cover-icon" class="text-[38px] mb-2 hidden">🖼️</div>
                            <div id="cover-text" class="text-[11px] text-black text-center leading-[1.6] hidden">
                                Upload<br>Cover</div>
                        @else
                            <img id="cover-preview" class="w-full h-full object-cover hidden" alt="cover">
                            <div id="cover-icon" class="text-[38px] mb-2">🖼️</div>
                            <div id="cover-text" class="text-[11px] text-black text-center leading-[1.6]">
                                Upload<br>Cover</div>
                        @endif
                    </div>

                    <div class="flex-1 flex flex-col gap-4 w-full">
                        <div>
                            <label class="block text-[13px] font-semibold text-black mb-2">
                                Judul Cerita
                            </label>

                            <input id="judul" type="text" name="title"
                                value="{{ old('title', $post->title ?? '') }}" placeholder="Judul yang menarik..."
                                class="w-full bg-white border border-[#355a75] rounded-xl px-4 py-3 text-[15px] text-black outline-none transition-all duration-200 placeholder:text-[#3d6880] focus:border-[#4a9aba]">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-[#DDD6FE] rounded-2xl p-6 mb-5 shadow-lg">

                <div class="text-[11px] font-bold tracking-[2px] uppercase text-black mb-5">
                    Sinopsis
                </div>

                <textarea id="sinopsis" name="sinopsis" oninput="updateChar()" placeholder="Ceritakan gambaran singkat kisahmu..."
                    class="w-full min-h-[180px] leading-[1.8] bg-white border border-[#355a75] rounded-xl px-4 py-3 text-[15px] text-black outline-none">{{ old('sinopsis', $post->sinopsis) }}</textarea>

                <div class="text-[12px] text-black text-right mt-2">

                    <span id="char-count">
                        {{ strlen(old('sinopsis', $post->sinopsis)) }}
                    </span>

                    / 500 karakter

                </div>

            </div>

            <div class="bg-[#DDD6FE] rounded-2xl p-6 mb-5 shadow-lg">

                <div class="text-[11px] font-bold tracking-[2px] uppercase text-black mb-5">
                    Genre
                </div>

                <div class="flex flex-wrap gap-3">
                    @php
                        // Daftar semua pilihan genre yang tersedia di aplikasi
                        $genres = ['Romance', 'Horor', 'Fantasi', 'Misteri', 'Komedi', 'Aksi', 'Drama', 'Thriller'];

                        // Mengecek tipe data 'genres' dari database ($post)
                        if (is_array($post->genre)) {
                            $oldGenres = $post->genre;
                        } else {
                            $oldGenres = json_decode($post->genre ?? '[]', true) ?? [];
                        }
                    @endphp

                    @foreach ($genres as $genre)
                        <label class="relative">
                            <input type="checkbox" name="genres[]" value="{{ $genre }}" class="hidden peer"
                                @checked(in_array($genre, old('genre', $oldGenres)))>

                            <div
                                class="px-5 py-2 rounded-full border border-[#7c6ac9]
          text-[#7c6ac9]
          text-[14px]
          font-medium
          cursor-pointer
          transition-all
          duration-200
          hover:border-[#9E7AE2]
          hover:text-white
          hover:bg-[#9E7AE2]
          peer-checked:bg-[#9E7AE2]
          peer-checked:border-[#9E7AE2]
          peer-checked:text-white">
                                {{ $genre }}
                            </div>
                        </label>
                    @endforeach
                </div>

            </div>

            <div class="bg-[#DDD6FE] rounded-2xl p-6 mb-5 shadow-lg">
                <div class="flex items-center justify-between mb-5">
                    <div class="text-[11px] font-bold tracking-[2px] uppercase text-black">
                        Chapter Cerita
                    </div>
                    <button type="button" onclick="addChapter()"
                        class="text-[14px] font-medium px-5 py-2 rounded-full border border-[#9E7AE2] bg-[#9E7AE2] text-white">
                        + Tambah Chapter
                    </button>
                </div>

                <div id="chapter-container" class="flex flex-col gap-6">
                    @foreach ($post->chapters as $index => $chapter)
                        <div class="chapter-box bg-white rounded-2xl p-5 border border-[#c4b5fd]">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-bold text-[#402988]">
                                    Chapter {{ $index + 1 }}
                                </h2>
                                <button type="button" onclick="removeChapter(this)" class="text-sm text-red-500">
                                    Hapus
                                </button>
                            </div>

                            <input type="hidden" name="chapters[{{ $index }}][id]" value="{{ $chapter->id }}">

                            <div class="flex flex-col gap-2 mb-4">
                                <label class="text-[13px] font-semibold text-black">
                                    Judul Chapter
                                </label>
                                <input type="text" name="chapters[{{ $index }}][title]"
                                    value="{{ old("chapters.$index.title", $chapter->title) }}"
                                    class="w-full bg-[#fafafa] border border-[#355a75] rounded-xl px-4 py-3 text-[15px] text-black outline-none">
                            </div>

                            <div class="flex flex-col gap-2">
                                <label class="text-[13px] font-semibold text-black">
                                    Isi Cerita
                                </label>
                                <textarea name="chapters[{{ $index }}][content]" rows="6"
                                    class="w-full min-h-[220px] bg-[#fafafa] border border-[#355a75] rounded-xl px-4 py-3 text-[15px] leading-[1.9] text-black outline-none">{{ old("chapters.$index.content", $chapter->content) }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 mt-7">
                <button type="button" onclick="toast('📝 Tersimpan sebagai draft!')"
                    class="flex-1 text-[16px] font-semibold py-4 rounded-xl bg-[#9E7AE2] border border-[#355a75] text-white transition-all duration-200 hover:bg-[#7c6ac9] hover:border-[#7c6ac9]">
                    Simpan Draft
                </button>
                <button type="submit"
                    class="flex-1 text-[16px] font-semibold py-4 rounded-xl bg-[#402988] text-white transition-all duration-200 hover:bg-[#7c6ac9]">
                    Simpan Perubahan
                </button>
                <button type="button" onclick="deleteStory()"
                    class="flex-1 text-[16px] font-semibold py-4 rounded-xl bg-[#f50202] text-white transition-all duration-200 hover:bg-[#b81c26]">
                    Hapus Cerita
                </button>
            </div>
        </form>
    </div>

    <div id="toast"
        class="fixed bottom-[30px] left-1/2 -translate-x-1/2 translate-y-[80px] bg-[#9E7AE2] border border-[#3a8fba] text-[#cce4f0] text-[15px] px-7 py-4 rounded-full transition-transform duration-300 z-[999] whitespace-nowrap shadow-xl">
        ✅ Berhasil!
    </div>

    <script>
        function previewCover(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = (ev) => {
                const img = document.getElementById('cover-preview');

                img.src = ev.target.result;
                img.style.display = 'block';

                document.getElementById('cover-icon').style.display = 'none';
                document.getElementById('cover-text').style.display = 'none';
            };
            reader.readAsDataURL(file);
        }

        function updateChar() {
            const val = document.getElementById('sinopsis').value.length;
            document.getElementById('char-count').textContent = val;
        }

        function deleteStory() {
            if (confirm('Apakah kamu yakin ingin menghapus cerita ini? Tindakan ini tidak bisa dibatalkan.')) {
                toast('🗑️ Cerita berhasil dihapus!');

                setTimeout(() => {
                    window.location.href = "{{ route('posts.ceritamu') }}";
                }, 1200);
            }
        }

        let tTimer;

        function toast(msg) {
            const el = document.getElementById('toast');
            el.textContent = msg;
            el.classList.remove('translate-y-[80px]');
            el.classList.add('translate-y-0');
            clearTimeout(tTimer);
            tTimer = setTimeout(() => {
                el.classList.remove('translate-y-0');
                el.classList.add('translate-y-[80px]');
            }, 2500);
        }

        let chapterIndex = parseInt("{{ $post->chapters->count() }}") || 0;

        function addChapter() {
            const container = document.getElementById('chapter-container');
            const div = document.createElement('div');
            div.className =
                "chapter-box bg-white rounded-2xl p-5 border border-[#c4b5fd]";
            div.innerHTML = `
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-bold text-[#402988]">
            Chapter Baru
        </h2>
        <button
            type="button"
            onclick="removeChapter(this)"
            class="text-sm text-red-500">
            Hapus
        </button>
    </div>
    <div class="flex flex-col gap-2 mb-4">
        <label class="text-[13px] font-semibold text-black">
            Judul Chapter
        </label>
        <input
            type="text"
            name="chapters[${chapterIndex}][title]"
            class="w-full bg-[#fafafa] border border-[#355a75] rounded-xl px-4 py-3 text-[15px] text-black outline-none">
    </div>
    <div class="flex flex-col gap-2">
        <label class="text-[13px] font-semibold text-black">
            Isi Cerita
        </label>
        <textarea
            name="chapters[${chapterIndex}][content]"
            rows="6"
            class="w-full min-h-[220px] bg-[#fafafa] border border-[#355a75] rounded-xl px-4 py-3 text-[15px] leading-[1.9] text-black outline-none"></textarea>
    </div>
    `;
            container.appendChild(div);
            chapterIndex++;
        }

        function removeChapter(button) {
            button.closest('.chapter-box').remove();
        }
    </script>
</body>

</html>
