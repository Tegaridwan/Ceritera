<!-- HALAMAN BACA-->

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Baca Cerita — Ceritera</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Merriweather:wght@300;400;700&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
    }

    .font-story {
      font-family: 'Merriweather', serif;
    }
  </style>
</head>

<body class="min-h-screen bg-gradient-to-b from-[#C4B5FD] from-[16%] to-[#DDD6FE] to-[92%] bg-fixed bg-no-repeat flex flex-col">

  <div id="sidebar"
    class="fixed right-0 top-0 bottom-0 z-50 flex w-[260px] translate-x-full flex-col border-l border-[#2a2a44] bg-[#12121e] transition-transform duration-300">

    <div class="flex items-center justify-between border-b border-[#2a2a44] bg-[#1e1e3a] px-4 py-[14px]">

      <span class="text-sm font-bold text-white">
        Daftar Chapter
      </span>

      <button onclick="toggleSidebar()"
        class="text-white text-lg">
        ✕
      </button>

    </div>

    <div class="flex-1 overflow-y-auto">

      @foreach($chapters as $item)

      <a
        href="{{ route('posts.read', [$post->id, $item->id]) }}"
        class="block border-b border-[#2a2a44] px-4 py-3 text-sm
        {{ $chapter->id == $item->id
            ? 'bg-[#7c3aed] text-white'
            : 'text-[#cbd5e1] hover:bg-[#1e293b]' }}">

        {{ $item->title }}

      </a>

      @endforeach

    </div>
  </div>


  <div class="flex min-h-screen">

    <div id="reader"
      class="mx-auto flex max-w-[520px] flex-1 flex-col">

      <!-- STICKY HEADER -->
      <div class="sticky top-0 z-40 flex flex-col shadow-md">
      <!-- TOPBAR -->
      <div class="border-b-2 border-[#3a8fba] bg-[#402988]">

        <div
          onclick="window.location.href='{{ route('posts.show', $post->id) }}';"
          class="cursor-pointer border-b border-[#2a2a44] px-5 py-3 text-[15px] font-bold text-white transition hover:bg-[rgba(255,255,255,0.1)]">
          ← Kembali
        </div>

        <div class="flex items-center gap-[14px] bg-[#402988] px-5 py-3">

          <div
            class="flex h-[56px] w-[44px] flex-shrink-0 items-center justify-center overflow-hidden rounded-[6px] bg-[#5c77c9] text-[20px]">

            <img
              src="{{ $post->cover ? asset('storage/' . $post->cover) : asset('images/default-cover.jpg') }}"
              alt="Cover"
              class="h-full w-full rounded-[6px] object-cover">
          </div>

          <div>
            <div id="story-title"
              class="text-[14px] font-semibold text-[#ffffff]">
              {{ $post->title }}
            </div>

            <div class="mt-[2px] text-[11px] text-[#ffffff]">
              {{ $post->user->name }}
            </div>
          </div>
        </div>
      </div>

      <!-- TOOLBAR -->
      <div
        class="flex items-center border-b border-[#2a2a44] bg-[#402988] px-5 py-2">

        <button
          onclick="fontSize('sm')"
          class="rounded-[6px] px-[10px] py-[5px] text-[13px] font-semibold text-white transition-all duration-200 hover:bg-[rgba(255,255,255,0.1)] hover:text-[#e0e7ff]">
          A-
        </button>

        <button
          onclick="fontSize('lg')"
          class="rounded-[6px] px-[10px] py-[5px] text-[13px] font-semibold text-white transition-all duration-200 hover:bg-[rgba(255,255,255,0.1)] hover:text-[#e0e7ff]">
          A+
        </button>

        <div class="mx-1 h-5 w-px flex-shrink-0 bg-[#2a2a44]"></div>

        <div
          onclick="handleProgress(event)"
          title="Progress baca"
          class="relative mx-2 h-1 flex-1 cursor-pointer rounded-[2px] bg-[#2a2a44]">

          <div id="progress-fill"
            class="h-full w-[18%] rounded-[2px] bg-[#7c3aed] transition-all duration-300">
          </div>
        </div>

        <div class="mx-1 h-5 w-px flex-shrink-0 bg-[#2a2a44]"></div>

        <button
          onclick="toggleDark()"
          title="Mode gelap"
          class="rounded-[6px] px-2 py-[5px] text-[16px] text-white transition-all duration-200 hover:bg-[rgba(255,255,255,0.1)] hover:text-[#e0e7ff]">
          🌙
        </button>
        <button
          onclick="toggleSidebar()"
          class="ml-3 rounded-[6px] px-3 py-[5px] text-[13px] font-semibold text-white hover:bg-[rgba(255,255,255,0.1)]">
          ☰ Chapter
        </button>
      </div>
      </div>

      <!-- CONTENT -->
      <div id="content-area"
        class="font-story flex-1 bg-[#f5f5f0] px-10 py-8 text-black">

        <div
          class="mb-5 border-b border-[#dde8ee] pb-4 text-center text-[18px] font-bold">
          {{ $chapter->title }}
        </div>

        <div id="story-body" class="text-[15px] font-light leading-[1.95] transition-all duration-300">

          <p class="mb-5">
            {{ $chapter->content }}
          </p>

        </div>
      </div>

      <!-- BOTTOM AREA -->
      <div id="bottom-area"
        class="border-t border-[#d0dce8] bg-[#f0f4f8]">

        <!-- REACTION -->
        <!-- <div
          class="flex items-center justify-center gap-5 border-b border-[#d0dce8] px-5 py-[14px]">

          <button
            onclick="toast('📤 Link disalin!')"
            class="flex items-center gap-[6px] bg-transparent text-[13px] font-medium transition-colors duration-200 hover:text-[#3a8fba]">

            <span class="text-[16px]">＜</span>
            <span>Bagikan</span>
          </button>
        </div> -->

        <!-- NAV -->
        <div class="flex gap-3 border-b border-[#d0dce8] px-5 py-[14px]">
          @if($prevChapter)
          <a
            href="{{ route('posts.read', [$post->id, $prevChapter->id]) }}"
            class="flex-1 rounded-[8px] border border-[#c0d0e0] bg-[#e8eff6] px-[10px] py-[10px] text-center text-[13px] font-semibold text-black hover:bg-[#d8e8f4]">
            ← Sebelumnya
          </a>
          @else
          <div
            class="flex-1 rounded-[8px] bg-gray-300 px-[10px] py-[10px] text-center text-[13px] font-semibold text-gray-500">
            ← Sebelumnya
          </div>
          @endif
          @if($nextChapter)
          <a
            href="{{ route('posts.read', [$post->id, $nextChapter->id]) }}"
            class="flex-1 rounded-[8px] bg-[#7c3aed] px-[10px] py-[10px] text-center text-[13px] font-semibold text-white hover:bg-[#402988]">
            Berikutnya →
          </a>
          @else
          <div
            class="flex-1 rounded-[8px] bg-gray-400 px-[10px] py-[10px] text-center text-[13px] font-semibold text-white">
            Tamat
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <!-- TOAST -->
  <div id="toast"
    class="fixed bottom-6 left-1/2 z-[999] translate-x-[-50%] translate-y-[80px] whitespace-nowrap rounded-[30px] border border-[#3a8fba] bg-[#1e2a3a] px-[22px] py-[10px] text-[13px] text-[#cce4f0] transition-transform duration-300">
    ✅ Berhasil!
  </div>

  <script>
    let darkMode = false;

    function toggleDark() {
      darkMode = !darkMode;

      const ca = document.getElementById('content-area');
      const ba = document.getElementById('bottom-area');

      if (darkMode) {
        ca.classList.remove('bg-[#f5f5f0]');
        ca.classList.add('bg-[#1a1a2e]');
        ca.classList.remove('text-black');
        ca.classList.add('text-white');

        ba.classList.remove('bg-[#f0f4f8]');
        ba.classList.add('bg-[#402988]');
        ba.classList.remove('text-black');
        ba.classList.add('text-white');
      } else {
        ca.classList.remove('bg-[#1a1a2e]');
        ca.classList.add('bg-[#f5f5f0]');
        ca.classList.remove('text-white');
        ca.classList.add('text-black');

        ba.classList.remove('bg-[#402988]');
        ba.classList.add('bg-[#f0f4f8]');
        ba.classList.remove('text-white');
        ba.classList.add('text-black');
      }
    }

    function fontSize(mode) {
      const body = document.getElementById('story-body');

      body.classList.remove('text-[13px]');
      body.classList.remove('text-[17px]');
      body.classList.add('text-[15px]');

      if (mode === 'sm') {
        body.classList.remove('text-[15px]');
        body.classList.add('text-[13px]');
      }

      if (mode === 'lg') {
        body.classList.remove('text-[15px]');
        body.classList.add('text-[17px]');
      }
    }

    let tTimer;

    function toast(msg) {
      const el = document.getElementById('toast');

      el.textContent = msg;

      el.classList.add('translate-y-0');

      clearTimeout(tTimer);

      tTimer = setTimeout(() => {
        el.classList.remove('translate-y-0');
        el.classList.add('translate-y-[80px]');
      }, 2500);
    }

    function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');

    sidebar.classList.toggle('translate-x-full');
  }
  </script>

</body>

</html>