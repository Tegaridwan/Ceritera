<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Baca Cerita — Ceritera</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Merriweather:wght@300;400;700&display=swap');
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Poppins', sans-serif; background: #1a1a2e; min-height: 100vh; }

    /* LAYOUT */
    .layout { display: flex; min-height: 100vh; }

    /* SIDEBAR EPISODE LIST */
    .sidebar {
      width: 200px; background: #12121e; border-left: 1px solid #2a2a44;
      position: fixed; right: 0; top: 0; bottom: 0;
      display: flex; flex-direction: column; z-index: 50;
      transform: translateX(100%); transition: transform 0.3s;
    }
    .sidebar.open { transform: translateX(0); }
    .sidebar-hdr {
      padding: 14px 16px; background: #1e1e3a;
      border-bottom: 1px solid #2a2a44;
      font-size: 11px; font-weight: 600; color: #6a8aaa;
      letter-spacing: 1.2px; text-transform: uppercase;
      display: flex; align-items: center; justify-content: space-between;
    }
    .sidebar-close { background: none; border: none; color: #6a8aaa; cursor: pointer; font-size: 16px; }
    .sidebar-label { font-size: 9px; color: #4a6a8a; letter-spacing: 1px; text-transform: uppercase; padding: 12px 16px 6px; }
    .ep-list { overflow-y: auto; flex: 1; }
    .ep-item {
      padding: 10px 16px; font-size: 12px; color: #7a9ab4;
      cursor: pointer; border-bottom: 1px solid rgba(255,255,255,0.04);
      transition: background 0.2s;
    }
    .ep-item:hover { background: rgba(58,143,186,0.08); color: #a0c8e0; }
    .ep-item.active { color: #5aabd0; font-weight: 600; background: rgba(58,143,186,0.12); }

    /* MAIN READER */
    .reader { flex: 1; max-width: 520px; margin: 0 auto; display: flex; flex-direction: column; }

    /* TOPBAR */
    .topbar {
      background: #1e1e3a; border-bottom: 2px solid #3a8fba;
      padding: 0; position: sticky; top: 0; z-index: 40;
    }
    .topbar-title {
      font-size: 15px; font-weight: 700;
      color: #5aabd0; padding: 12px 20px;
      border-bottom: 1px solid #2a2a44;
    }
    .story-header {
      display: flex; align-items: center; gap: 14px;
      padding: 12px 20px; background: #243352;
    }
    .story-cover {
      width: 44px; height: 56px; border-radius: 6px;
      background: #8ab4d4; flex-shrink: 0;
      display: flex; align-items: center; justify-content: center;
      font-size: 20px;
    }
    .story-cover img { width: 100%; height: 100%; object-fit: cover; border-radius: 6px; }
    .story-meta {}
    .story-title { font-size: 14px; font-weight: 600; color: #e0f0ff; }
    .story-author { font-size: 11px; color: #7a9ab4; margin-top: 2px; }

    /* READER TOOLBAR */
    .reader-toolbar {
      display: flex; align-items: center; gap: 0;
      padding: 8px 20px; background: #1e2a3a;
      border-bottom: 1px solid #2a3a50;
    }
    .tb-btn {
      background: none; border: none; color: #6a8aaa;
      font-size: 13px; font-weight: 600; cursor: pointer;
      padding: 5px 10px; border-radius: 6px; transition: all 0.2s;
      font-family: 'Poppins', sans-serif;
    }
    .tb-btn:hover { background: rgba(90,171,208,0.1); color: #a0c8e0; }
    .tb-divider { width: 1px; height: 20px; background: #2a3a50; margin: 0 4px; flex-shrink: 0; }
    .progress-bar {
      flex: 1; height: 4px; background: #2a3a50; border-radius: 2px;
      margin: 0 8px; cursor: pointer; position: relative;
    }
    .progress-fill { height: 100%; border-radius: 2px; background: #3a8fba; width: 18%; transition: width 0.3s; }
    .tb-icon {
      background: none; border: none; color: #6a8aaa;
      font-size: 16px; cursor: pointer; padding: 5px 8px;
      border-radius: 6px; transition: all 0.2s;
    }
    .tb-icon:hover { background: rgba(90,171,208,0.1); color: #a0c8e0; }

    /* CONTENT AREA */
    .content-area {
      background: #f5f5f0; flex: 1;
      padding: 32px 40px;
      font-family: 'Merriweather', serif;
    }
    .content-area.dark-mode { background: #1a1a2e; }
    .ep-title-h {
      font-size: 18px; font-weight: 700; color: #1a2a3a;
      text-align: center; margin-bottom: 20px;
      padding-bottom: 16px; border-bottom: 1px solid #dde8ee;
    }
    .content-area.dark-mode .ep-title-h { color: #d0e8f4; border-bottom-color: #2a3a50; }
    .story-text {
      font-size: 15px; line-height: 1.95; color: #2a3a4a;
      font-weight: 300;
    }
    .content-area.dark-mode .story-text { color: #a0b8cc; }
    .story-text p { margin-bottom: 20px; }
    .story-text .dialog {
      border-left: 3px solid #3a8fba; padding-left: 16px;
      margin: 22px 0; font-style: italic; color: #1a3a5a;
    }
    .content-area.dark-mode .story-text .dialog { color: #6aaccc; }

    /* BOTTOM ACTIONS */
    .bottom-area { background: #f0f4f8; border-top: 1px solid #d0dce8; }
    .content-area.dark-mode ~ .bottom-area { background: #1e2a3a; border-top-color: #2a3a50; }

    .reaction-row {
      display: flex; align-items: center; justify-content: center;
      gap: 20px; padding: 14px 20px;
      border-bottom: 1px solid #d0dce8;
    }
    .react-btn {
      display: flex; align-items: center; gap: 6px;
      font-size: 13px; color: #4a6a8a; cursor: pointer;
      background: none; border: none; font-family: 'Poppins', sans-serif;
      font-weight: 500; transition: color 0.2s;
    }
    .react-btn:hover { color: #3a8fba; }
    .react-btn .icon { font-size: 16px; }

    .nav-row {
      display: flex; gap: 12px; padding: 14px 20px;
      border-bottom: 1px solid #d0dce8;
    }
    .btn-nav {
      flex: 1; font-family: 'Poppins', sans-serif;
      font-size: 13px; font-weight: 600;
      padding: 10px; border-radius: 8px;
      cursor: pointer; transition: all 0.2s; text-align: center;
    }
    .btn-prev {
      background: #e8eff6; border: 1px solid #c0d0e0; color: #4a6a8a;
    }
    .btn-prev:hover { background: #d8e8f4; }
    .btn-next {
      background: #2a5a8a; border: none; color: #fff;
    }
    .btn-next:hover { background: #3a7ab0; }

    /* KOMENTAR */
    .komentar-section { padding: 16px 20px 30px; }
    .komentar-label {
      font-size: 10px; font-weight: 700;
      letter-spacing: 1.5px; text-transform: uppercase;
      color: #6a8aaa; margin-bottom: 12px;
    }
    .komentar-input-wrap {
      background: #fff; border: 1px solid #c8d8e8;
      border-radius: 10px; overflow: hidden;
    }
    .komentar-input {
      width: 100%; padding: 12px 16px;
      font-family: 'Poppins', sans-serif; font-size: 12px;
      color: #2a3a4a; border: none; outline: none;
      min-height: 70px; resize: none; background: transparent;
    }
    .komentar-input::placeholder { color: #9ab0c4; }
    .komentar-footer {
      display: flex; justify-content: flex-end;
      padding: 8px 12px; border-top: 1px solid #e0eaf2;
    }
    .btn-kirim {
      font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 600;
      padding: 7px 20px; border-radius: 6px;
      background: #2a5a8a; border: none; color: #fff;
      cursor: pointer; transition: background 0.2s;
    }
    .btn-kirim:hover { background: #3a7ab0; }

    /* KOMENTAR LIST */
    .komentar-list { margin-top: 14px; display: flex; flex-direction: column; gap: 12px; }
    .komentar-item {
      display: flex; gap: 10px;
    }
    .k-avatar {
      width: 32px; height: 32px; border-radius: 50%;
      flex-shrink: 0; display: flex; align-items: center;
      justify-content: center; font-size: 13px; font-weight: 600;
    }
    .k-body { flex: 1; }
    .k-user { font-size: 11px; font-weight: 600; color: #2a5a8a; margin-bottom: 3px; }
    .k-text { font-size: 12px; color: #4a6a8a; line-height: 1.6; }
    .k-time { font-size: 10px; color: #9ab0c4; margin-top: 4px; }

    /* TOAST */
    #toast {
      position: fixed; bottom: 24px; left: 50%;
      transform: translateX(-50%) translateY(80px);
      background: #1e2a3a; border: 1px solid #3a8fba;
      color: #cce4f0; font-size: 13px; padding: 10px 22px;
      border-radius: 30px; transition: transform 0.3s; z-index: 999;
      white-space: nowrap;
    }
    #toast.show { transform: translateX(-50%) translateY(0); }

    /* FONT SIZE */
    .fs-sm .story-text { font-size: 13px; }
    .fs-lg .story-text { font-size: 17px; }
  </style>
</head>
<body>

<!-- SIDEBAR EPISODE LIST -->
<!-- <div class="sidebar" id="sidebar">
  <div class="sidebar-hdr">
    <span>Episode Lis...</span>
    <button class="sidebar-close" onclick="toggleSidebar()">✕</button>
  </div>
  <div class="sidebar-label">Daftar Halaman</div>
  <div class="ep-list">
    <div class="ep-item active" onclick="gotoEp(1,this)">EPS 1</div>
    <div class="ep-item" onclick="gotoEp(2,this)">EPS 2</div>
    <div class="ep-item" onclick="gotoEp(3,this)">EPS 3</div>
    <div class="ep-item" onclick="gotoEp(4,this)">EPS 4</div>
    <div class="ep-item" onclick="gotoEp(5,this)">EPS 5</div>
    <div class="ep-item" onclick="gotoEp(6,this)">EPS 6</div>
  </div>
</div> -->

<div class="layout">
  <div class="reader" id="reader">

    <!-- TOPBAR -->
    <div class="topbar">
      <div class="topbar-title" onclick="window.location.href='{{ route('posts.index') }}';" style="cursor:pointer;">← Kembali</div>
      <div class="story-header">
        <div class="story-cover"> <img src="{{ asset('images/' . $post->cover) }}" alt="Cover"></div>
        <div class="story-meta">
          <div class="story-title" id="story-title">{{ $post->title }}</div>
          <div class="story-author">{{  $post->user->name }}</div>
        </div>
      </div>
    </div>

    <!-- TOOLBAR -->
    <div class="reader-toolbar">
      <button class="tb-btn" onclick="fontSize('sm')">A-</button>
      <button class="tb-btn" onclick="fontSize('lg')">A+</button>
      <div class="tb-divider"></div>
      <div class="progress-bar" onclick="handleProgress(event)" title="Progress baca">
        <div class="progress-fill" id="progress-fill"></div>
      </div>
      <div class="tb-divider"></div>
      <button class="tb-icon" onclick="toggleDark()" title="Mode gelap">🌙</button>
      <!-- <button class="tb-icon" title="Bookmark" onclick="toast('🔖 Ditambahkan ke bookmark!')">🔖</button> -->
      <!-- <button class="tb-icon" onclick="toggleSidebar()" title="Daftar episode">☰</button> -->
    </div>

    <!-- CONTENT -->
    <div class="content-area" id="content-area">
      <div class="ep-title-h">{{ $post->title }}</div>
      <div class="story-text" id="story-body">
        <p>{{ $post->content }}</p>
      </div>
    </div>

    <!-- BOTTOM AREA -->
    <div class="bottom-area" id="bottom-area">
      <!-- REACTIONS -->
      <div class="reaction-row">
        <!-- <button class="react-btn" onclick="toggleLike()">
          <span class="icon" id="like-icon">🔥</span>
          <span id="like-count">9999</span>
        </button>
        <button class="react-btn" onclick="toast('💬 Komentar dimuat...')">
          <span class="icon">✏️</span>
          <span>1111</span>
        </button> -->
        <button class="react-btn" onclick="toast('📤 Link disalin!')">
          <span class="icon">＜</span>
          <span>Bagikan</span>
        </button>
      </div>

      <!-- NAV BUTTONS -->
      <div class="nav-row">
        <button class="btn-nav btn-prev" onclick="prevEp()">← Sebelumnya</button>
        <button class="btn-nav btn-next" onclick="nextEp()">Berikutnya →</button>
      </div>

      <!-- KOMENTAR -->
      <!-- <div class="komentar-section">
        <div class="komentar-label">Komentar</div>
        <div class="komentar-input-wrap">
          <textarea class="komentar-input" id="komentar-input"
            placeholder="Tuliskan pemikiran Anda tentang bab ini..."></textarea>
          <div class="komentar-footer">
            <button class="btn-kirim" onclick="kirimKomentar()">KIRIM</button>
          </div>
        </div>

        <div class="komentar-list" id="komentar-list">
          <div class="komentar-item">
            <div class="k-avatar" style="background:#ddeeff;color:#2a5a8a;">AR</div>
            <div class="k-body">
              <div class="k-user">Ariska_R</div>
              <div class="k-text">Ceritanya sangat menarik! Nggak bisa berhenti baca dari tadi.</div>
              <div class="k-time">2 jam lalu</div>
            </div>
          </div>
          <div class="komentar-item">
            <div class="k-avatar" style="background:#ddf0e8;color:#2a6a4a;">DM</div>
            <div class="k-body">
              <div class="k-user">Dimas_M</div>
              <div class="k-text">Plot twist di akhir bab ini gila banget. Nunggu episode selanjutnya!</div>
              <div class="k-time">5 jam lalu</div>
            </div>
          </div>
        </div>
      </div> -->
    </div>

  </div>
</div>

<div id="toast">✅ Berhasil!</div>

<script>
  // ── DATA EPISODE ──
  const episodes = [
    {
      title: "Pintu di Ujung Lorong",
      content: `<p>Raya menyeret koper terakhirnya melewati ambang pintu apartemen 4B — sebuah ruangan sempit di lantai paling atas gedung tua Arkaveld. Catnya sudah mengelupas di beberapa sudut, dan jendela satu-satunya menghadap ke dinding bata abu-abu.</p>
      <p>Ia menjatuhkan diri ke kasur tipis, menatap plafon bermotif retak yang tampak seperti peta negeri antah berantah. Dari luar, sayup-sayup terdengar suara kota — klakson, langkah kaki, bisikan angin.</p>
      <div class="dialog">"Selamat datang di Arkaveld," bisiknya pada diri sendiri. "Kota tempat semuanya dimulai dari nol."</div>
      <p>Ia belum sempat menutup matanya ketika mendengar sesuatu. Bukan suara keras. Justru sebaliknya — sebuah keheningan yang tiba-tiba menelan seluruh bunyi di sekitarnya, seperti seseorang mematikan volume dunia.</p>
      <p>Di ujung lorong sempit, ada sebuah pintu. Pintu yang tidak seharusnya ada di sana — karena ketika ia pertama kali masuk tadi, dinding itu kosong. Rata. Hanya tembok putih biasa.</p>
      <div class="dialog">"Hei," panggilnya. "Ada yang di sana?"</div>
      <p>Tidak ada jawaban. Di bawah celah pintu yang gelap, Raya bisa melihat bayangan kaki. Seseorang berdiri di sisi lain. Dan perlahan — gagang pintu itu mulai bergerak...</p>`
    },
    {
      title: "Suara di Balik Dinding",
      content: `<p>Malam kedua di Arkaveld lebih sunyi dari yang pertama. Raya duduk di sudut ruangan, memandangi pintu yang kini tampak seperti bagian dinding biasa di bawah cahaya siang — seolah semua kejadian semalam hanyalah mimpi.</p>
      <p>Tapi ada sesuatu yang tidak bisa ia abaikan: bekas telapak tangan di debu lantai depan pintu itu. Telapak tangan yang bukan miliknya.</p>
      <div class="dialog">"Kamu baru pindah?" — suara dari dinding sebelah mengejutkannya. Suara perempuan. Rendah dan serak.</div>
      <p>Raya menempelkan telinganya ke dinding. Detak jantungnya berdentum tidak karuan saat ia menyadari satu hal: dinding itu harusnya mengarah ke luar gedung, bukan ke unit sebelah.</p>`
    },
    {
      title: "Cermin yang Berbohong",
      content: `<p>Ada yang aneh dengan cermin di kamar mandi itu. Raya menyadarinya ketika ia mengangkat tangan kanan — tapi bayangan di cermin mengangkat tangan kiri. Sebaliknya. Seperti cermin biasa.</p>
      <p>Ia menghela napas. Tentu saja begitu. Cermin memang membalik gambar. Tapi kemudian — bayangan itu tersenyum. Dan Raya tidak sedang tersenyum.</p>
      <div class="dialog">"Akhirnya kamu melihatku," kata bayangan itu dengan bibir yang bergerak tapi tidak mengeluarkan suara — hanya terbaca dari gerakan bibirnya.</div>
      <p>Raya berlari keluar kamar mandi. Tapi ketika ia berbalik dari ambang pintu, bayangan di cermin itu masih berdiri di tempatnya — menatap Raya dengan senyuman yang tidak pernah pudar.</p>`
    },
    {
      title: "Tamu yang Tidak Diundang",
      content: `<p>Seseorang mengetuk pintunya jam tiga pagi. Tiga kali ketukan, pelan dan teratur. Raya berbaring di kasur, menatap langit-langit, tidak bergerak.</p>
      <p>Tiga ketukan lagi. Lalu hening.</p>
      <div class="dialog">"Raya," suara di balik pintu itu memanggilnya. Suara yang ia kenal. Suara ibunya yang sudah meninggal tiga tahun lalu.</div>
      <p>Raya menutup mulutnya dengan kedua tangan untuk menahan jeritan. Air matanya mengalir diam-diam. Di bawah celah pintu, bayangan kaki itu berdiri tidak bergerak selama satu jam penuh — sampai fajar tiba dan bayangan itu menghilang begitu saja.</p>`
    },
    { title: "Malam Ketujuh", content: "<p>Hari ketujuh. Raya sudah tidak tidur selama empat hari terakhir. Matanya panas, pikirannya kabur. Tapi ia tidak berani menutup mata — karena setiap kali ia tidur, ia bermimpi tentang pintu itu. Dan dalam mimpi, pintu selalu terbuka.</p><p>Malam ketujuh berbeda. Pintu itu tidak hanya terbuka — ada tangan yang menjulur keluar, mengundangnya masuk.</p>" },
    { title: "Akhir dari Malam", content: "<p>Pagi hari setelah malam ketujuh, apartemen 4B ditemukan kosong. Pintu depan terbuka. Koper Raya masih di sudut ruangan. Ponselnya masih di atas meja. Hanya satu hal yang berbeda — pintu misterius di ujung lorong itu kini terbuka lebar, dan di baliknya hanya ada dinding bata yang dingin.</p><p>Tidak ada jejak. Tidak ada tanda. Hanya sebuah catatan kecil tertinggal di lantai, ditulis dengan tangan gemetar: <em>'Aku sudah menemukannya.'</em></p>" }
  ];

  let currentEp = 0;
  let darkMode = false;
  let liked = false;
  let likeCount = 9999;
  let fontMode = 'normal';

  function loadEp(idx) {
    currentEp = idx;
    document.getElementById('ep-title').textContent = episodes[idx].title;
    document.getElementById('story-body').innerHTML = episodes[idx].content;
    document.getElementById('story-title').textContent = 'Malam Tanpa Akhir';
    document.getElementById('progress-fill').style.width = ((idx + 1) / episodes.length * 100) + '%';
    document.querySelectorAll('.ep-item').forEach((el, i) => el.classList.toggle('active', i === idx));
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  function gotoEp(num, el) {
    loadEp(num - 1);
    toggleSidebar();
  }

  function nextEp() {
    if (currentEp < episodes.length - 1) loadEp(currentEp + 1);
    else toast('🎉 Ini adalah episode terakhir!');
  }

  function prevEp() {
    if (currentEp > 0) loadEp(currentEp - 1);
    else toast('⚠️ Ini adalah episode pertama!');
  }

  function toggleDark() {
    darkMode = !darkMode;
    const ca = document.getElementById('content-area');
    const ba = document.getElementById('bottom-area');
    ca.classList.toggle('dark-mode', darkMode);
    ba.style.background = darkMode ? '#1e2a3a' : '';
    ba.style.borderTopColor = darkMode ? '#2a3a50' : '';
    document.querySelectorAll('.react-btn').forEach(b => b.style.color = darkMode ? '#6a9ab4' : '');
    document.querySelector('.komentar-label').style.color = darkMode ? '#5a8aaa' : '';
    document.querySelector('.komentar-input-wrap').style.background = darkMode ? '#1a2a3a' : '';
    document.querySelector('.komentar-input').style.color = darkMode ? '#a0c0d8' : '';
  }

  function fontSize(mode) {
    const reader = document.getElementById('reader');
    reader.classList.remove('fs-sm', 'fs-lg');
    if (mode === 'sm') { reader.classList.add('fs-sm'); fontMode = 'sm'; }
    else if (mode === 'lg') { reader.classList.add('fs-lg'); fontMode = 'lg'; }
  }

  function toggleLike() {
    liked = !liked;
    likeCount += liked ? 1 : -1;
    document.getElementById('like-count').textContent = likeCount;
    document.getElementById('like-icon').textContent = liked ? '❤️' : '🔥';
    if (liked) toast('❤️ Kamu menyukai cerita ini!');
  }

  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
  }

  function handleProgress(e) {
    const bar = e.currentTarget;
    const pct = e.offsetX / bar.offsetWidth;
    const epIdx = Math.floor(pct * episodes.length);
    loadEp(Math.min(epIdx, episodes.length - 1));
  }

  function kirimKomentar() {
    const inp = document.getElementById('komentar-input');
    const val = inp.value.trim();
    if (!val) { toast('⚠️ Tulis komentar dulu!'); return; }
    const list = document.getElementById('komentar-list');
    const item = document.createElement('div');
    item.className = 'komentar-item';
    item.innerHTML = `
      <div class="k-avatar" style="background:#f0ddee;color:#7a2a6a;">KM</div>
      <div class="k-body">
        <div class="k-user">Kamu</div>
        <div class="k-text">${val}</div>
        <div class="k-time">Baru saja</div>
      </div>`;
    list.prepend(item);
    inp.value = '';
    toast('💬 Komentar berhasil dikirim!');
  }

  let tTimer;
  function toast(msg) {
    const el = document.getElementById('toast');
    el.textContent = msg;
    el.classList.add('show');
    clearTimeout(tTimer);
    tTimer = setTimeout(() => el.classList.remove('show'), 2500);
  }

  // INIT
  loadEp(0);
</script>
</body>
</html>
<!-- <h1 class="text-3xl font-bold mb-4">
    {{ $post->title }}
</h1>

<p>
    {{ $post->content }}
</p> -->