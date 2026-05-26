<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Ceritera</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-[#160833] flex flex-col">
    <header class="w-full bg-[#1A0A3C] px-6 py-5 flex items-center gap-2 flex-shrink-0">
        <span class="text-2xl font-bold text-[#C4B5FD]">Ceritera</span>
        <span class="text-[9px] bg-[#7C4DCC] text-white rounded px-1.5 py-0.5 font-bold tracking-wide">ADMIN</span>
    </header>

    <div class="flex flex-1">
        <aside class="w-52 bg-[#160833] flex flex-col justify-between flex-shrink-0 py-6 px-4">
            <div>
                <nav class="flex flex-col gap-1">
                    <a onclick="showSection('dashboard')" id="nav-dashboard"
                        class="block px-4 py-2.5 rounded-lg text-sm text-white cursor-pointer bg-[#7C4DCC] font-semibold">
                        Dashboard
                    </a>
                    <a onclick="showSection('users')" id="nav-users"
                        class="block px-4 py-2.5 rounded-lg text-sm text-gray-300 cursor-pointer hover:text-white">
                        Manajemen User
                    </a>
                    <a onclick="showSection('stories')" id="nav-stories"
                        class="block px-4 py-2.5 rounded-lg text-sm text-gray-300 cursor-pointer hover:text-white">
                        Manajemen Cerita
                    </a>
                </nav>
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex items-center bg-[#4B2CA0] rounded-xl gap-3 px-3 py-3">
                    <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#4B2CA0] font-bold text-sm flex-shrink-0">A</div>
                    <div>
                        <p class="text-white text-xs font-bold">Super Admin</p>
                        <p class="text-[#C4B5FD] text-[10px]">admin@ceritera.id</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 bg-[#f90000] hover:bg-[#940c0c] rounded-xl px-3 py-3 transition">
                        <div class="flex-1 text-center">
                            <p class="text-white text-xs font-bold">
                                Logout
                            </p>
                        </div>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 bg-[#C8D8F8] p-8">
            <div id="section-dashboard">
                <div class="grid grid-cols-3 gap-5 mb-8">
                    <div class="bg-[#7C4DCC] rounded-2xl p-6 cursor-pointer hover:bg-[#4B2CA0] transition" onclick="showSection('users')">
                        <p class="text-3xl mb-3">👤</p>
                        <p class="text-4xl font-bold text-white">{{ $users->count() }}</p>
                        <p class="text-[#C4B5FD] text-sm mt-1">Total Pengguna</p>
                    </div>
                    <div class="bg-[#7C4DCC] rounded-2xl p-6 cursor-pointer hover:bg-[#4B2CA0] transition" onclick="showSection('stories')">
                        <p class="text-3xl mb-3">📖</p>
                        <p class="text-4xl font-bold text-white">{{ $posts->count() }}</p>
                        <p class="text-[#C4B5FD] text-sm mt-1">Total Cerita</p>
                    </div>
                    <div class="bg-[#7C4DCC] rounded-2xl p-6">
                        <p class="text-3xl mb-3">🏷️</p>
                        <p class="text-4xl font-bold text-white">1</p>
                        <p class="text-[#C4B5FD] text-sm mt-1">Total Genre</p>
                    </div>
                </div>
            </div>

            <div id="section-users" class="hidden">
                <div class="space-y-3">
                    @foreach($users as $user)
                    <div class="bg-[#1A0A3C] rounded-xl px-5 py-4 flex items-center justify-between cursor-pointer hover:bg-[#2A1A4C] transition"
                        onclick="lihatDetailUser(
                        '{{ $user->name }}',
                        '{{ $user->email }}',
                        '{{ $user->role }}',
                        '{{ $user->created_at->format('d F Y') }}',
                        '{{ $user->posts->count() }})')">
                        <div class="flex items-center gap-3">

                            <div class="w-9 h-9 rounded-full bg-[#7C4DCC] flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>

                            <div>
                                <p class="text-white text-sm font-semibold">
                                    {{ $user->name }}
                                </p>

                                <p class="text-[#C4B5FD] text-[11px]">
                                    {{ $user->email }} · {{ $user->role }}
                                </p>
                            </div>

                        </div>
                        <div class="flex items-center gap-3">

                            <span class="text-[#C4B5FD] text-[11px]">
                                Bergabung {{ $user->created_at->format('d M Y') }}
                            </span>
                            <button onclick="event.stopPropagation(); hapusItem(this)" class="text-gray-400 hover:text-red-400 transition text-lg">🗑</button>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>

            <div id="section-stories" class="hidden">
                <div id="view-story-list">

                    <h2 class="text-lg font-bold text-[#1A0A3C] mb-4">
                        Daftar Cerita
                    </h2>

                    <div class="space-y-3">
                        @foreach($posts as $post)
                        <div class="bg-[#1A0A3C] rounded-xl px-5 py-4 flex items-center justify-between cursor-pointer hover:bg-[#2A1A4C] transition"
                            onclick="lihatDetailCerita(
                            '{{ addslashes($post->title) }}',
                            '{{ addslashes($post->user->name) }}',
                            '{{ $post->genre }}',
                            '{{ addslashes($post->sinopsis) }}',
                            )">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-10 rounded overflow-hidden flex-shrink-0">
                                    <img
                                        src="{{ asset('images/' . $post->cover) }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-white text-sm font-semibold">
                                        {{ $post->title }}
                                    </p>
                                    <p class="text-[#C4B5FD] text-[11px]">
                                        oleh: {{ $post->user->name }} · {{ $post->genre }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <button
                                    onclick="bukaBacaCerita()"
                                    class="mt-5 w-full bg-[#4B2CA0] hover:bg-[#7C4DCC] text-white font-semibold py-2.5 rounded-lg">
                                    📖 Baca Cerita
                                </button>
                                <button onclick="event.stopPropagation(); hapusItem(this)" class="text-gray-400 hover:text-red-400 transition text-lg">🗑</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>

        function showSection(name) {
            ['dashboard', 'users', 'stories'].forEach(s => {
                let section = document.getElementById('section-' + s);
                let nav = document.getElementById('nav-' + s);
                
                if(section) section.classList.add('hidden');
                if(nav) nav.className = 'block px-4 py-2.5 rounded-lg text-sm text-gray-300 cursor-pointer hover:text-white';
            });
            
            let activeSection = document.getElementById('section-' + name);
            let activeNav = document.getElementById('nav-' + name);
            
            if(activeSection) activeSection.classList.remove('hidden');
            if(activeNav) activeNav.className = 'block px-4 py-2.5 rounded-lg text-sm text-white cursor-pointer bg-[#7C4DCC] font-semibold';
            
            if (name === 'users') showView('user-list');
            if (name === 'stories') showView('story-list');
        }

        function showView(type) {
            ['view-user-list', 'view-user-detail'].forEach(id => {
                let el = document.getElementById(id);
                if(el) el.classList.add('hidden');
            });
            ['view-story-list', 'view-story-detail', 'view-story-read'].forEach(id => {
                let el = document.getElementById(id);
                if(el) el.classList.add('hidden');
            });
            
            let activeView = document.getElementById('view-' + type);
            if (activeView) activeView.classList.remove('hidden');
        }

        let currentStory = null;
        let currentChapter = 0;

        function lihatDetailCerita(post) {
            currentStory = post;

            document.getElementById('ds-judul').textContent = post.title;
            document.getElementById('ds-penulis').textContent = post.user.name;
            document.getElementById('ds-genre').textContent = post.genre;
            document.getElementById('ds-sinopsis').textContent = post.sinopsis;

            showView('story-detail');
        }

        function bukaBacaCerita() {
            showView('story-read');

            renderChapterList();

            loadChapter(0);
        }

        function renderChapterList() {
            const list = document.getElementById('chapter-list');

            list.innerHTML = '';

            currentStory.chapters.forEach((chapter, index) => {

                list.innerHTML += `
            <button
            onclick="loadChapter(${index})"
            class="w-full text-left px-4 py-3 rounded-lg hover:bg-gray-100">
                Chapter ${chapter.chapter_number} - ${chapter.title}
            </button>
        `;
            });
        }

        function loadChapter(index) {
            currentChapter = index;

            const chapter = currentStory.chapters[index];

            document.getElementById('read-title').textContent =
                currentStory.title;

            document.getElementById('read-chapter').textContent =
                'Chapter ' + chapter.chapter_number + ' - ' + chapter.title;

            document.getElementById('read-content').innerHTML =
                chapter.content.replace(/\n/g, '<br>');
        }

        function nextChapter() {
            if (currentChapter < currentStory.chapters.length - 1) {
                loadChapter(currentChapter + 1);
            }
        }

        function prevChapter() {
            if (currentChapter > 0) {
                loadChapter(currentChapter - 1);
            }
        }

        function toggleChapterList() {
            document
                .getElementById('chapter-list')
                .classList.toggle('hidden');
        }


        function hapusItem(btn) {
            btn.closest('.bg-\\[\\#1A0A3C\\]').remove();
        }
    </script>

</body>

</html>