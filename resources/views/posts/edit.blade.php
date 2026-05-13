<!-- <form action="/posts/{{ $post->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $post->title }}">
    <textarea name="content">{{ $post->content }}</textarea>
    <button type="submit">Update</button>
</form> -->
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

    <span
      onclick="window.location.href='{{ route('posts.ceritamu') }}';"
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
        <span class="text-[#402988]">Edit Cerita</span>
      </h1>

    </div>

    <!-- INFORMASI CERITA -->
    <div class="bg-[#DDD6FE] rounded-2xl p-6 mb-5 shadow-lg">

      <div class="text-[11px] font-bold tracking-[2px] uppercase text-black mb-5">
        Informasi Cerita
      </div>

      <div class="flex flex-col sm:flex-row gap-5 items-start">

        <!-- COVER -->
        <div
          id="cover-box"
          class="w-[140px] h-[180px] rounded-xl bg-white border-2 border-dashed border-[#3d6f90] flex flex-col items-center justify-center cursor-pointer flex-shrink-0 relative overflow-hidden transition-all duration-200 hover:border-[#5aabd0] hover:bg-[#2d5070]">

          <input
            type="file"
            accept="image/*"
            onchange="previewCover(event)"
            class="absolute inset-0 opacity-0 cursor-pointer">

          <img
            id="cover-preview"
            class="w-full h-full object-cover hidden"
            alt="cover">

          <div id="cover-icon" class="text-[38px] mb-2">
            🖼️
          </div>

          <div
            id="cover-text"
            class="text-[11px] text-black text-center leading-[1.6]">
            Upload<br>Cover
          </div>

        </div>

        <!-- INPUT -->
        <div class="flex-1 flex flex-col gap-4 w-full">

          <div>

            <label class="block text-[13px] font-semibold text-black mb-2">
              Judul Cerita
            </label>

            <input
              id="judul"
              type="text"
              placeholder="Judul yang menarik..."
              class="w-full bg-white border border-[#355a75] rounded-xl px-4 py-3 text-[15px] text-black outline-none transition-all duration-200 placeholder:text-[#3d6880] focus:border-[#4a9aba]">

          </div>

          <div>

            <label class="block text-[13px] font-semibold text-black mb-2">
              Tagline
            </label>

            <input
              type="text"
              placeholder="Satu kalimat yang menggugah rasa ingin tahu"
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

      <textarea
        id="sinopsis"
        oninput="updateChar()"
        placeholder="Ceritakan gambaran singkat kisahmu... Buat pembaca penasaran!"
        class="w-full min-h-[180px] leading-[1.8] bg-white border border-[#355a75] rounded-xl px-4 py-3 text-[15px] text-black outline-none transition-all duration-200 placeholder:text-[#3d6880] focus:border-[#4a9aba]"></textarea>

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

        <button onclick="toggleGenre(this)"
          class="gc on text-[14px] font-medium px-5 py-2 rounded-full border border-[#9E7AE2] bg-[#9E7AE2] text-white transition-all duration-200">
          Romance
        </button>

        <button onclick="toggleGenre(this)"
          class="gc text-[14px] font-medium px-5 py-2 rounded-full border border-[#7c6ac9] text-[#7c6ac9] transition-all duration-200 hover:border-[#9E7AE2] hover:text-white">
          Horor
        </button>

        <button onclick="toggleGenre(this)"
          class="gc on text-[14px] font-medium px-5 py-2 rounded-full border border-[#9E7AE2] bg-[#9E7AE2] text-white transition-all duration-200">
          Fantasi
        </button>

        <button onclick="toggleGenre(this)"
          class="gc text-[14px] font-medium px-5 py-2 rounded-full border border-[#7c6ac9] text-[#7c6ac9] transition-all duration-200 hover:border-[#9E7AE2] hover:text-white">
          Misteri
        </button>

        <button onclick="toggleGenre(this)"
          class="gc text-[14px] font-medium px-5 py-2 rounded-full border border-[#7c6ac9] text-[#7c6ac9] transition-all duration-200 hover:border-[#9E7AE2] hover:text-white">
          Komedi
        </button>

        <button onclick="toggleGenre(this)"
          class="gc text-[14px] font-medium px-5 py-2 rounded-full border border-[#7c6ac9] text-[#7c6ac9] transition-all duration-200 hover:border-[#9E7AE2] hover:text-white">
          Aksi
        </button>

        <button onclick="toggleGenre(this)"
          class="gc text-[14px] font-medium px-5 py-2 rounded-full border border-[#7c6ac9] text-[#7c6ac9] transition-all duration-200 hover:border-[#9E7AE2] hover:text-white">
          Drama
        </button>

        <button onclick="toggleGenre(this)"
          class="gc text-[14px] font-medium px-5 py-2 rounded-full border border-[#7c6ac9] text-[#7c6ac9] transition-all duration-200 hover:border-[#9E7AE2] hover:text-white">
          Thriller
        </button>

      </div>

    </div>
    <div class="bg-[#DDD6FE] rounded-2xl p-6 mb-5 shadow-lg">

      <div class="flex flex-col gap-5">
        <div class="flex flex-col gap-2">

          <label class="text-[13px] font-semibold text-black">
            Isi Cerita
          </label>

          <textarea
            id="ep-isi"
            rows="5"
            placeholder="Mulai tulis ceritamu di sini...

Gunakan paragraf yang jelas dan menarik untuk pembaca."
            class="w-full min-h-[260px] bg-white border border-[#355a75] rounded-xl px-4 py-3 text-[15px] leading-[1.9] text-black outline-none transition-all duration-200 placeholder:text-[#3d6880] focus:border-[#4a9aba]"></textarea>

        </div>

      </div>

    </div>

    <!-- BUTTON -->
    <div class="flex flex-col sm:flex-row gap-4 mt-7">

      <button
        onclick="toast('📝 Tersimpan sebagai draft!')"
        class="flex-1 text-[16px] font-semibold py-4 rounded-xl bg-[#9E7AE2] border border-[#355a75] text-white transition-all duration-200 hover:bg-[#7c6ac9] hover:border-[#7c6ac9]">
        Simpan Draft
      </button>

      <button
        onclick="doPublish()"
        class="flex-1 text-[16px] font-semibold py-4 rounded-xl bg-[#402988] text-white transition-all duration-200 hover:bg-[#7c6ac9]">
        Simpan Perubahan
      </button>

      <button
        onclick="deleteStory()"
        class="flex-1 text-[16px] font-semibold py-4 rounded-xl bg-[#f50202] text-white transition-all duration-200 hover:bg-[#b81c26]">
        Hapus Cerita
      </button>
    </div>

  </div>

  <!-- TOAST -->
  <div
    id="toast"
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

    function toggleGenre(el) {
      el.classList.toggle('on');

      if (el.classList.contains('on')) {
      el.classList.remove(
        'border-[#7c6ac9]',
        'text-[#7c6ac9]'
      );

      el.classList.add(
        'bg-[#9E7AE2]',
        'border-[#9E7AE2]',
        'text-white'
      );
      } else {
      el.classList.remove(
        'bg-[#9E7AE2]',
        'border-[#9E7AE2]',
        'text-white'
      );

      el.classList.add(
        'border-[#7c6ac9]',
        'text-[#7c6ac9]'
      );
      }
    }

    // STATUS PUBLIKASI
    let statusPublic = true;

    function toggleStatus() {

      statusPublic = !statusPublic;

      const btn = document.getElementById('btn-status');

      btn.textContent = statusPublic ? 'Publik' : 'Privat';

      if (statusPublic) {

        btn.style.borderColor = "#3a8fba";
        btn.style.opacity = "1";

      } else {

        btn.style.borderColor = "#355a75";
        btn.style.opacity = "0.7";
      }
    }

    function doPublish() {

      const judul = document.getElementById('judul').value.trim();

      if (!judul) {

        toast('⚠️ Isi judul cerita dulu!');
        return;
      }

      toast('🚀 Cerita berhasil dipublikasikan!');

      setTimeout(() => {
        window.location.href = 'baca-cerita.html';
      }, 1200);
    }

    function deleteStory() {
      if (confirm('Apakah kamu yakin ingin menghapus cerita ini? Tindakan ini tidak bisa dibatalkan.')) {
        toast('🗑️ Cerita berhasil dihapus!');

        setTimeout(() => {
          window.location.href = '{{ route('posts.ceritamu') }}';
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
  </script>

</body>

</html>