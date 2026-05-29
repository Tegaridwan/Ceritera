<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tulis Cerita — Ceritera</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
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

    <!-- TOPBAR -->
    <div class="bg-[#402988] px-5 py-4 flex items-center gap-3 shadow-md">

        <span onclick="window.location.href='{{ route('posts.index') }}';"
            class="text-[15px] text-[#90b8cc] font-medium cursor-pointer hover:text-white transition">

            ← Beranda

        </span>

        <span class="text-[#4a7a9a] text-[15px]">|</span>

        <span class="text-[#cce4f0] text-[15px] font-semibold">
            Tulis
        </span>

    </div>

    <!-- MAIN -->
    <div class="max-w-[780px] mx-auto px-5 pt-6 pb-[70px]">

        <!-- TITLE -->
        <div class="flex items-center gap-3 mb-6">

            <span class="text-[28px]">✍️</span>

            <h1 class="text-[28px] font-bold text-[#1b2e3e]">
                <span class="text-[#402988]">
                    Tambah Cerita Baru
                </span>
            </h1>

        </div>

        <!-- ERROR -->
        @if ($errors->any())

            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-5">

                <ul class="list-disc ml-5">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <!-- INFORMASI CERITA -->
            <div class="bg-[#DDD6FE] rounded-2xl p-6 mb-5 shadow-lg">

                <div class="text-[11px] font-bold tracking-[2px] uppercase text-black mb-5">

                    Informasi Cerita

                </div>

                <div class="flex flex-col sm:flex-row gap-5 items-start">

                    <!-- COVER -->
                    <div id="cover-box"
                        class="w-[140px] h-[180px] rounded-xl bg-white border-2 border-dashed border-[#3d6f90] flex flex-col items-center justify-center cursor-pointer flex-shrink-0 relative overflow-hidden transition-all duration-200 hover:border-[#5aabd0] hover:bg-[#2d5070]">

                        <input type="file" name="cover" accept="image/*" onchange="previewCover(event)"
                            class="absolute inset-0 opacity-0 cursor-pointer">

                        <img id="cover-preview" class="w-full h-full object-cover hidden" alt="cover">

                        <div id="cover-icon" class="text-[38px] mb-2">
                            🖼️
                        </div>

                        <div id="cover-text" class="text-[11px] text-black text-center leading-[1.6]">

                            Upload<br>Cover

                        </div>

                    </div>

                    <!-- INPUT -->
                    <div class="flex-1 flex flex-col gap-4 w-full">

                        <div>

                            <label class="block text-[13px] font-semibold text-black mb-2">

                                Judul Cerita

                            </label>

                            <input id="judul" name="title" type="text" value="{{ old('title') }}"
                                placeholder="Judul yang menarik..."
                                class="w-full bg-white border border-[#355a75] rounded-xl px-4 py-3 text-[15px] text-black outline-none transition-all duration-200 placeholder:text-[#3d6880] focus:border-[#4a9aba]">

                        </div>

                    </div>

                </div>

            </div>

            <!-- SINOPSIS -->
            <div class="bg-[#DDD6FE] rounded-2xl p-6 mb-5 shadow-lg">

                <div class="text-[11px] font-bold tracking-[2px] uppercase text-black mb-5">

                    Sinopsis

                </div>

                <textarea id="sinopsis" name="sinopsis" oninput="updateChar()"
                    placeholder="Ceritakan gambaran singkat kisahmu... Buat pembaca penasaran!"
                    class="w-full min-h-[180px] leading-[1.8] bg-white border border-[#355a75] rounded-xl px-4 py-3 text-[15px] text-black outline-none transition-all duration-200 placeholder:text-[#3d6880] focus:border-[#4a9aba]">{{ old('sinopsis') }}</textarea>

                <div class="text-[12px] text-black text-right mt-2">

                    <span id="char-count">0</span> / 500 karakter

                </div>

            </div>

            <!-- GENRE -->
            <div class="bg-[#DDD6FE] rounded-2xl p-6 mb-5 shadow-lg">

                <div class="text-[11px] font-bold tracking-[2px] uppercase text-black mb-5">

                    Genre

                </div>

                <div class="flex flex-wrap gap-3">

                    @php
                        $genres = ['Romance', 'Horor', 'Fantasi', 'Misteri', 'Komedi', 'Aksi', 'Drama', 'Thriller'];
                    @endphp

                    @foreach ($genres as $genre)
                        <label class="relative">

                            <input type="checkbox" name="genres[]" value="{{ $genre }}" class="hidden peer">

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

            <!-- CHAPTER -->
            <div class="bg-[#DDD6FE] rounded-2xl p-6 mb-5 shadow-lg">

                <div class="flex items-center justify-between mb-5 flex-wrap gap-3">

                    <div class="text-[11px] font-bold tracking-[2px] uppercase text-black">

                        Chapter Cerita

                    </div>

                    <button type="button" onclick="addChapter()"
                        class="text-[14px] font-medium px-5 py-2 rounded-full border border-[#9E7AE2] bg-[#9E7AE2] text-white transition-all duration-200 hover:bg-[#7c6ac9]">

                        + Tambah Chapter

                    </button>

                </div>

                <!-- TEMPAT CHAPTER -->
                <div id="chapter-container" class="flex flex-col gap-6">

                    <!-- CHAPTER PERTAMA -->
                    <div class="chapter-box bg-white rounded-2xl p-5 border border-[#c4b5fd]">

                        <div class="flex items-center justify-between mb-4">

                            <h2 class="text-lg font-bold text-[#402988] chapter-title">

                                Chapter 1

                            </h2>

                        </div>

                        <!-- JUDUL -->
                        <div class="flex flex-col gap-2 mb-4">

                            <label class="text-[13px] font-semibold text-black">

                                Judul Chapter

                            </label>

                            <input type="text" name="chapters[0][title]" placeholder="Masukkan judul chapter..."
                                class="w-full bg-[#fafafa] border border-[#355a75] rounded-xl px-4 py-3 text-[15px] text-black outline-none">

                        </div>

                        <!-- ISI -->
                        <div class="flex flex-col gap-2">

                            <label class="text-[13px] font-semibold text-black">

                                Isi Cerita

                            </label>

                            <textarea rows="6" name="chapters[0][content]" placeholder="Mulai tulis chapter..."
                                class="w-full min-h-[220px] bg-[#fafafa] border border-[#355a75] rounded-xl px-4 py-3 text-[15px] leading-[1.9] text-black outline-none"></textarea>

                        </div>

                    </div>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex flex-col sm:flex-row gap-4 mt-7">

                <button type="submit" name="action" value="draft"
                    class="flex-1 text-[16px] font-semibold py-4 rounded-xl bg-[#9E7AE2] border border-[#355a75] text-white transition-all duration-200 hover:bg-[#7c6ac9] hover:border-[#7c6ac9]">

                    Simpan Draft

                </button>

                <button type="submit" name="action" value="publish"
                    class="flex-1 text-[16px] font-semibold py-4 rounded-xl bg-[#402988] text-white transition-all duration-200 hover:bg-[#7c6ac9]">

                    Publikasi Sekarang

                </button>

            </div>

        </form>

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

            const val = document
                .getElementById('sinopsis')
                .value.length;

            document
                .getElementById('char-count')
                .textContent = val;
        }

        let chapterCount = 1;

        function addChapter() {

            const container = document.getElementById('chapter-container');

            const chapter = document.createElement('div');

            chapter.className =
                "chapter-box bg-white rounded-2xl p-5 border border-[#c4b5fd]";

            chapter.innerHTML = `
                <div class="flex items-center justify-between mb-4">

                    <h2 class="text-lg font-bold text-[#402988]">
                        Chapter ${chapterCount + 1}
                    </h2>

                    <button
                        type="button"
                        onclick="removeChapter(this)"
                        class="text-sm text-red-500 hover:text-red-700">

                        Hapus

                    </button>

                </div>

                <div class="flex flex-col gap-2 mb-4">

                    <label class="text-[13px] font-semibold text-black">
                        Judul Chapter
                    </label>

                    <input
                        type="text"
                        name="chapters[${chapterCount}][title]"
                        placeholder="Masukkan judul chapter..."
                        class="w-full bg-[#fafafa] border border-[#355a75] rounded-xl px-4 py-3 text-[15px] text-black outline-none">

                </div>

                <div class="flex flex-col gap-2">

                    <label class="text-[13px] font-semibold text-black">
                        Isi Cerita
                    </label>

                    <textarea
                        rows="6"
                        name="chapters[${chapterCount}][content]"
                        placeholder="Mulai tulis chapter..."
                        class="w-full min-h-[220px] bg-[#fafafa] border border-[#355a75] rounded-xl px-4 py-3 text-[15px] leading-[1.9] text-black outline-none"></textarea>

                </div>
            `;

            container.appendChild(chapter);

            chapterCount++;
        }

        function removeChapter(button) {

            const chapterBox = button.closest('.chapter-box');

            chapterBox.remove();
        }
    </script>

</body>

</html>
