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
                        <p class="text-4xl font-bold text-white">3</p>
                        <p class="text-[#C4B5FD] text-sm mt-1">Total Pengguna</p>
                    </div>
                    <div class="bg-[#7C4DCC] rounded-2xl p-6 cursor-pointer hover:bg-[#4B2CA0] transition" onclick="showSection('stories')">
                        <p class="text-3xl mb-3">📖</p>
                        <p class="text-4xl font-bold text-white">1</p>
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
                <div id="view-user-list">
                    <h2 class="text-lg font-bold text-[#1A0A3C] mb-4">Daftar Pengguna</h2>
                    <div class="space-y-3">
                        <div class="bg-[#1A0A3C] rounded-xl px-5 py-4 flex items-center justify-between cursor-pointer hover:bg-[#2A1A4C] transition"
                            onclick="lihatDetailUser('Tegar Ridwan', 'tegar@email.com', 'Penulis', '12 Mei 2026', 3)">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-[#7C4DCC] flex items-center justify-center text-white text-sm font-bold flex-shrink-0">T</div>
                                <div>
                                    <p class="text-white text-sm font-semibold">Tegar Ridwan</p>
                                    <p class="text-[#C4B5FD] text-[11px]">tegar@email.com · Penulis</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-[#C4B5FD] text-[11px]">Bergabung 12 Mei 2026</span>
                                <button onclick="event.stopPropagation(); hapusItem(this)" class="text-gray-400 hover:text-red-400 transition text-lg">🗑</button>
                            </div>
                        </div>
                        <div class="bg-[#1A0A3C] rounded-xl px-5 py-4 flex items-center justify-between cursor-pointer hover:bg-[#2A1A4C] transition"
                            onclick="lihatDetailUser('Aisyah Nur Fadillah', 'dilla@email.com', 'Penulis', '10 Mei 2026', 5)">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-[#7C4DCC] flex items-center justify-center text-white text-sm font-bold flex-shrink-0">A</div>
                                <div>
                                    <p class="text-white text-sm font-semibold">Aisyah Nur Fadillah</p>
                                    <p class="text-[#C4B5FD] text-[11px]">dilla@email.com · Penulis</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-[#C4B5FD] text-[11px]">Bergabung 10 Mei 2026</span>
                                <button onclick="event.stopPropagation(); hapusItem(this)" class="text-gray-400 hover:text-red-400 transition text-lg">🗑</button>
                            </div>
                        </div>
                        <div class="bg-[#1A0A3C] rounded-xl px-5 py-4 flex items-center justify-between cursor-pointer hover:bg-[#2A1A4C] transition"
                            onclick="lihatDetailUser('Nadhifia Talitha', 'nadhifia@email.com', 'Pembaca', '22 Mei 2026', 0)">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-[#7C4DCC] flex items-center justify-center text-white text-sm font-bold flex-shrink-0">N</div>
                                <div>
                                    <p class="text-white text-sm font-semibold">Nadhifia Talitha</p>
                                    <p class="text-[#C4B5FD] text-[11px]">nadhifia@email.com · Pembaca</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-[#C4B5FD] text-[11px]">Bergabung 22 Mei 2026</span>
                                <button onclick="event.stopPropagation(); hapusItem(this)" class="text-gray-400 hover:text-red-400 transition text-lg">🗑</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="view-user-detail" class="hidden">
                    <div class="flex items-center gap-3 mb-6">
                        <button onclick="showView('user-list')" class="text-[#4B2CA0] hover:text-[#7C4DCC] font-semibold text-sm">← Kembali</button>
                        <h2 class="text-lg font-bold text-[#1A0A3C]">Detail Pengguna</h2>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm p-6 max-w-md">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-[#9B72E8] flex items-center justify-center text-white text-2xl font-bold flex-shrink-0" id="du-avatar">U</div>
                            <div>
                                <p class="font-bold text-[#1A0A3C] text-lg" id="du-nama">-</p>
                                <p class="text-sm text-gray-400" id="du-email">-</p>
                            </div>
                        </div>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-400">Role</span>
                                <span class="font-semibold text-[#1A0A3C]" id="du-role">-</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-400">Tanggal Bergabung</span>
                                <span class="font-semibold text-[#1A0A3C]" id="du-tanggal">-</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-400">Jumlah Cerita</span>
                                <span class="font-semibold text-[#1A0A3C]" id="du-cerita">-</span>
                            </div>
                            <div class="flex justify-between pb-2">
                                <span class="text-gray-400">Status Akun</span>
                                <span class="font-semibold text-green-500">Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="section-stories" class="hidden">

                <div id="view-story-list">
                    <h2 class="text-lg font-bold text-[#1A0A3C] mb-4">Daftar Cerita</h2>
                    <div class="space-y-3">
                        <div class="bg-[#1A0A3C] rounded-xl px-5 py-4 flex items-center justify-between cursor-pointer hover:bg-[#2A1A4C] transition"
                            onclick="lihatDetailCerita('Si Kancil Anak Nakal', 'Nadhifia Talitha', 'Komedi', 'Disebuah hutan di Dungus.', '22 Mei 2026', 999, 1000)">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-10 rounded bg-[#7C4DCC] flex items-center justify-center text-white text-xs flex-shrink-0">📖</div>
                                <div>
                                    <p class="text-white text-sm font-semibold">Si Kancil Anak Nakal</p>
                                    <p class="text-[#C4B5FD] text-[11px]">oleh: Nadhifia Talitha · Horor</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-[#C4B5FD] text-[11px]">🔥 999 likes</span>
                                <button onclick="event.stopPropagation(); hapusItem(this)" class="text-gray-400 hover:text-red-400 transition text-lg">🗑</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="view-story-detail" class="hidden">
                    <div class="flex items-center gap-3 mb-6">
                        <button onclick="showView('story-list')" class="text-[#4B2CA0] hover:text-[#7C4DCC] font-semibold text-sm">← Kembali</button>
                        <h2 class="text-lg font-bold text-[#1A0A3C]">Detail Cerita</h2>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm p-6 max-w-lg">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-14 h-20 rounded-lg bg-[#9B72E8] flex items-center justify-center text-white text-2xl flex-shrink-0">📖</div>
                            <div>
                                <p class="font-bold text-[#1A0A3C] text-lg" id="ds-judul">-</p>
                                <p class="text-sm text-gray-400">oleh: <span id="ds-penulis">-</span></p>
                                <span class="mt-1 inline-block bg-[#3B1A8A] text-[#C4B5FD] text-[10px] px-2 py-0.5 rounded" id="ds-genre">-</span>
                            </div>
                        </div>
                        <div class="space-y-3 text-sm">
                            <div class="border-b pb-3">
                                <span class="text-gray-400 block mb-1">Sinopsis</span>
                                <p class="text-[#1A0A3C]" id="ds-sinopsis">-</p>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-400">Tanggal Terbit</span>
                                <span class="font-semibold text-[#1A0A3C]" id="ds-tanggal">-</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-400">Jumlah Pembaca</span>
                                <span class="font-semibold text-[#1A0A3C]" id="ds-pembaca">-</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-400">Total Like</span>
                                <span class="font-semibold text-[#1A0A3C]" id="ds-like">-</span>
                            </div>
                            <div class="flex justify-between pb-2">
                                <span class="text-gray-400">Status Cerita</span>
                                <span class="font-semibold text-green-500">Publik</span>
                            </div>
                        </div>
                        <button onclick="bukaBacaCerita()" class="mt-5 w-full text-center bg-[#4B2CA0] hover:bg-[#7C4DCC] text-white font-semibold py-2.5 rounded-lg transition duration-200 text-sm">
                            📖 Baca Cerita
                        </button>
                    </div>
                </div>

                <div id="view-story-read" class="hidden">
                    <div class="flex items-center gap-3 mb-6">
                        <button onclick="showView('story-detail')" class="text-[#4B2CA0] hover:text-[#7C4DCC] font-semibold text-sm">← Kembali ke Detail</button>
                        <h2 class="text-lg font-bold text-[#1A0A3C]" id="read-judul-header">-</h2>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm p-8 max-w-2xl">
                        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                            <div class="w-10 h-14 rounded bg-[#9B72E8] flex items-center justify-center text-white text-lg flex-shrink-0">📖</div>
                            <div>
                                <p class="font-bold text-[#1A0A3C]" id="read-judul">-</p>
                                <p class="text-xs text-gray-400">oleh: <span id="read-penulis">-</span></p>
                                <span class="mt-1 inline-block bg-[#3B1A8A] text-[#C4B5FD] text-[10px] px-2 py-0.5 rounded" id="read-genre">-</span>
                            </div>
                        </div>
                        <div id="read-isi" class="text-sm text-[#1A0A3C] leading-8"></div>
                        <div class="mt-6 pt-4 border-t border-gray-100 flex justify-between text-xs text-gray-400">
                            <span id="read-tanggal">-</span>
                            <span id="read-like">-</span>
                            <span id="read-pembaca">-</span>
                        </div>
                    </div>
                </div>

            </div>

        </main>
    </div>

    <script>
        const isiCerita = {
            'Si Kancil Anak Nakal': `Di hutan yang subur dan rimbun, hiduplah sekelompok hewan yang harmonis dan damai. Di antara mereka, ada seekor kancil muda yang lincah dan cerdik. Namanya adalah Kancil. Dia terkenal di hutan karena kecerdasannya, tetapi terkadang kecerdikannya diwarnai dengan keusilannya.
            Suatu hari, Kancil memutuskan untuk bermain lelucon kepada teman-temannya. Dia mengumpulkan daun kering dan ranting-ranting, lalu menyusunnya sedemikian rupa sehingga menyerupai ular besar yang menakutkan. Setelah selesai, dengan tertawa-tawa, dia menempatkan “ular” tiruannya di tengah jalan yang sering dilalui oleh hewan-hewan lain.

            Teman-teman Kancil yang lain terkejut melihat “ular” itu. Mereka menjadi panik dan berlarian menjauh. Kancil yang melihat reaksi mereka merasa senang dengan leluconnya yang berhasil. Namun, ketika dia sedang asyik menertawakan reaksi teman-temannya, datanglah seekor burung hantu tua yang bijaksana.

            Burung hantu itu melihat “ular” tiruan Kancil dengan tatapan bijaknya. Dia tersenyum sambil berkata, “Wahai Kancil, kecerdikanmu patut diapresiasi, tetapi ingatlah bahwa kecerdikan yang dipakai untuk menakuti dan membuat orang lain panik tidaklah baik. Hal itu hanya akan menyebabkan ketakutan dan kekacauan di hutan ini.”

            Kancil merasa malu mendengar nasihat burung hantu itu. Dia menyadari bahwa leluconnya tidaklah lucu dan hanya menimbulkan ketakutan pada teman-temannya. Dari kejadian itu, Kancil belajar bahwa kecerdikan seharusnya digunakan untuk hal-hal yang positif dan membangun, bukan untuk hal-hal yang menyakiti atau menakuti orang lain.

            Sejak saat itu, Kancil berjanji untuk menggunakan kecerdasannya dengan bijak dan bertanggung jawab. Dia menjadi lebih berhati-hati dalam tindakannya dan selalu memikirkan dampaknya terhadap orang lain. Dengan demikian, kecerdikan Kancil menjadi sebuah alat yang bermanfaat bagi kebaikan dan kedamaian di hutan mereka.`
        };

        let currentStory = {};

        function showSection(name) {
            ['dashboard', 'users', 'stories'].forEach(s => {
                document.getElementById('section-' + s).classList.add('hidden');
                document.getElementById('nav-' + s).className = 'block px-4 py-2.5 rounded-lg text-sm text-gray-300 cursor-pointer hover:text-white';
            });
            document.getElementById('section-' + name).classList.remove('hidden');
            document.getElementById('nav-' + name).className = 'block px-4 py-2.5 rounded-lg text-sm text-white cursor-pointer bg-[#7C4DCC] font-semibold';
            if (name === 'users') showView('user-list');
            if (name === 'stories') showView('story-list');
        }

        function showView(type) {
            ['view-user-list', 'view-user-detail'].forEach(id => {
                document.getElementById(id).classList.add('hidden');
            });
            ['view-story-list', 'view-story-detail', 'view-story-read'].forEach(id => {
                document.getElementById(id).classList.add('hidden');
            });
            if (type === 'user-list') document.getElementById('view-user-list').classList.remove('hidden');
            if (type === 'user-detail') document.getElementById('view-user-detail').classList.remove('hidden');
            if (type === 'story-list') document.getElementById('view-story-list').classList.remove('hidden');
            if (type === 'story-detail') document.getElementById('view-story-detail').classList.remove('hidden');
            if (type === 'story-read') document.getElementById('view-story-read').classList.remove('hidden');
        }

        function lihatDetailUser(nama, email, role, tanggal, jumlahCerita) {
            document.getElementById('du-avatar').textContent = nama.charAt(0).toUpperCase();
            document.getElementById('du-nama').textContent = nama;
            document.getElementById('du-email').textContent = email;
            document.getElementById('du-role').textContent = role;
            document.getElementById('du-tanggal').textContent = tanggal;
            document.getElementById('du-cerita').textContent = jumlahCerita + ' Cerita';
            showView('user-detail');
        }

        function lihatDetailCerita(judul, penulis, genre, sinopsis, tanggal, like, pembaca) {
            currentStory = {
                judul,
                penulis,
                genre,
                sinopsis,
                tanggal,
                like,
                pembaca
            };
            document.getElementById('ds-judul').textContent = judul;
            document.getElementById('ds-penulis').textContent = penulis;
            document.getElementById('ds-genre').textContent = genre;
            document.getElementById('ds-sinopsis').textContent = sinopsis;
            document.getElementById('ds-tanggal').textContent = tanggal;
            document.getElementById('ds-like').textContent = like.toLocaleString();
            document.getElementById('ds-pembaca').textContent = pembaca.toLocaleString() + ' pembaca';
            showView('story-detail');
        }

        function bukaBacaCerita() {
            const s = currentStory;
            document.getElementById('read-judul-header').textContent = s.judul;
            document.getElementById('read-judul').textContent = s.judul;
            document.getElementById('read-penulis').textContent = s.penulis;
            document.getElementById('read-genre').textContent = s.genre;
            document.getElementById('read-tanggal').textContent = 'Diposting: ' + s.tanggal;
            document.getElementById('read-like').textContent = '🔥 ' + s.like.toLocaleString() + ' likes';
            document.getElementById('read-pembaca').textContent = '👁 ' + s.pembaca.toLocaleString() + ' pembaca';
            const isi = isiCerita[s.judul] || 'Isi cerita belum tersedia.';
            const paragraf = isi.split('\n\n').map(p => `<p class="mb-5">${p}</p>`).join('');
            document.getElementById('read-isi').innerHTML = paragraf;
            showView('story-read');
        }

        function hapusItem(btn) {
            btn.closest('.bg-\\[\\#1A0A3C\\]').remove();
        }
    </script>

</body>

</html>