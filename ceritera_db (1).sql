-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 13 Jun 2026 pada 15.12
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.5.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceritera_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-wadawd@gmail.com|127.0.0.1', 'i:1;', 1780625403),
('laravel-cache-wadawd@gmail.com|127.0.0.1:timer', 'i:1780625402;', 1780625402);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `chapter_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `chapters`
--

INSERT INTO `chapters` (`id`, `post_id`, `title`, `content`, `chapter_number`, `created_at`, `updated_at`) VALUES
(32, 19, 'Bicara Tentang Indigo', 'Indigo adalah nama dari aura warna, yakni perpaduan antara ungu dan biru. Pasca tahun 2000, banyak terlahir anak-anak dengan aura warna indigo. Beberapa kaum spiritual menyebut bahwa anak-anak indigo pada dasarnya adalah \"jiwa tua\" yang terlahir kembali dengan membawa misi masing-masing. Indigo sendiri sebenarnya tidak hanya sekadar memiliki kepekaan untuk berinteraksi dengan makhluk halus, melainkan memiliki berbagai spesialisasi (Interdimensi, Artis, Humanis, Konseptualis).', 1, '2026-06-04 06:00:54', '2026-06-04 06:00:54'),
(33, 19, 'Pocong', 'Pocong adalah hantu yang paling banyak ditakuti. Ada dua klasifikasi utama:\r\n\r\nPocong Asli: Berasal dari qorin putih orang yang meninggal. Biasanya muncul tidak untuk menakuti, melainkan karena ada pesan yang belum tersampaikan atau urusan yang mengganjal. Wajahnya tidak terlihat dan tertutup rapat.\r\n\r\nPocong KW (Abal-abal): Jin sesat yang menyamar atau qorin merah yang menyimpan dendam. Sering muncul dengan wajah terbuka, mata merah menyala, dan menakutkan untuk menyerap rasa takut manusia sebagai energi.\r\n\r\nVarian Pocong:\r\n\r\nPocong Gondrong: Berasal dari qorin merah yang dibunuh secara licik. Muncul terbang sambil menangis dengan rambut terurai panjang.\r\n\r\nPocong Merah: Pimpinan koloni pocong, dulunya seorang dukun ilmu hitam yang dibunuh dan dimutilasi. Kain kafannya memerah karena darah.\r\n\r\nPocong Beranak: Ibu dan anak yang meninggal akibat kecelakaan lalu lintas (ditumbalkan oleh Buto Ijo). Menjadi simbol kasih ibu yang tak berakhir meski raga terpisah.\r\n\r\nPocong Gundul & Pocong Sumi: Sosok berenergi sangat negatif yang menetap di bangunan-bangunan kolonial yang terbengkalai.', 2, '2026-06-04 06:00:54', '2026-06-04 06:00:54'),
(34, 19, 'Tuyul', 'Makhluk dari bangsa jin ifrit berwujud anak kecil gundul, tersohor sebagai pencuri uang.\r\nTuyul dipelihara melalui pesugihan. Syarat utamanya adalah pemilik (istri) harus menyusui tuyul tersebut (yang dihisap adalah darah, membuat inang kurus kering). Tuyul memiliki sifat manja layaknya anak kecil; minta disuapi, dibelikan mainan, dan diajak jalan-jalan.', 3, '2026-06-04 06:00:54', '2026-06-04 06:00:54'),
(35, 19, 'Genderuwo', 'Wujudnya seperti kera besar kekar, hitam legam berbulu lebat, dan bermata merah. Menyukai tempat lembab, berair, dan gelap. Mampu menyerupai wujud manusia (biasanya laki-laki) untuk tujuan cabul dan menggoda manusia.', 4, '2026-06-04 06:00:54', '2026-06-04 06:00:54'),
(36, 19, 'Wewe (Gombel)', 'Wujudnya mirip genderuwo namun memiliki payudara yang nyaris menyentuh tanah. Wewe sangat menyukai anak kecil dan sering \"meminjam\" (menculik) anak-anak yang bermain saat magrib. Waktu di alam gaib berjalan berbeda, sehingga walau wewe merasa hanya meminjam sebentar, di alam manusia bisa berhari-hari.', 5, '2026-06-04 06:00:54', '2026-06-04 06:00:54'),
(42, 20, 'Akar Keserakahan dan Terciptanya Bank Gaib', 'Dari masa ke masa, harta dan materi duniawi selalu menjadi persoalan yang membuat manusia frustrasi ketika jumlahnya menipis. Keinginan untuk kaya secara instan tanpa bekerja keras melahirkan jalan pintas yang negatif, salah satunya adalah pesugihan. Praktik pesugihan bukanlah hal baru; akarnya sudah ada sejak zaman animisme dan dinamisme, ketika manusia masih memuja benda dan roh. Pada zaman dahulu, manusia melakukan tapa brata untuk mendekatkan diri pada Sang Pencipta, namun jin dan siluman sering kali datang menggoda dengan menawarkan kekayaan secara seketika. Fenomena ini kemudian semakin merebak pada masa kolonial akibat tingginya beban upeti dan himpitan ekonomi.\r\n\r\nHarta gaib yang didapatkan dari pesugihan ini bukanlah ilusi semata, melainkan uang nyata yang memiliki nomor seri. Uang tersebut dikelola oleh sebuah institusi gaib yang disebut Bank Gaib. Praktik Bank Gaib beroperasi dengan cara mencuri uang dari bank-bank di dunia nyata menggunakan kekuatan metafisik. Untuk mencegah pencurian gaib ini, banyak institusi keuangan di dunia nyata yang terpaksa mempekerjakan penjaga gaib seperti Batara Karang. Namun, penjagaan gaib ini menuntut bayaran berupa tumbal darah segar setiap 35 hari sekali.', 1, '2026-06-04 06:27:56', '2026-06-04 06:27:56'),
(43, 20, 'Misteri Pohon Randu Putih dan Syarat Perjanjian', 'Pulau Jawa dikenal sebagai surga bagi para pencari pesugihan, dan salah satu lokasi Bank Gaib yang paling terkenal berada di sebuah pohon di Jawa Tengah. Pohon tersebut adalah Pohon Randu Putih yang sudah berusia ratusan tahun. Pohon ini memiliki ciri fisik yang unik karena tidak memiliki cabang dan terdapat lubang yang lumayan besar pada bagian bawah batangnya. Para pencari pesugihan percaya bahwa jika kesepakatan berhasil, uang akan berjatuhan dari lubang pohon tersebut layaknya sebuah mesin ATM.\r\n\r\nUntuk mengakses Bank Gaib ini, seorang pemohon tidak bisa datang sendiri; mereka membutuhkan perantara lintas dimensi yang disebut Juru Kunci. Juru Kunci bertugas memfasilitasi komunikasi dan memberitahukan syarat-syarat sesajian yang harus disiapkan. Syarat sesajian tersebut meliputi:\r\n\r\nApel Jin.\r\n\r\nIngkung Ayam Jawa \"Jago\".\r\n\r\nKembang Setaman.\r\n\r\nKemenyan.\r\n\r\nKopi Item.\r\n\r\nRokok.\r\n\r\nTelur Ayam Jawa.\r\n\r\nProsesi penyerahan sesajian dan pembacaan mantra berbahasa Jawa kuno ini biasanya dilakukan menjelang matahari terbenam atau waktu magrib, waktu di mana kekuatan dari dunia lain sedang menghimpun energinya.', 2, '2026-06-04 06:27:56', '2026-06-04 06:27:56'),
(44, 20, 'Teror Ujian dan Penguasa Ular Raksasa', 'Menyerahkan sesajian hanyalah langkah awal, karena institusi Bank Gaib ini sangat selektif dalam memilih pelanggannya. Setelah menemui Juru Kunci, sang pemohon akan diikuti oleh entitas gaib untuk diuji selama kurang lebih 35 hari atau dalam hitungan titen weton. Pada masa pengawasan ini, pemohon akan dihantui oleh berbagai gangguan gaib yang mencekam untuk menguji seberapa besar niat mereka. Sinyal terakhir dari ujian ini biasanya ditandai dengan kunjungan mimpi berupa penampakan ular yang sangat besar.\r\n\r\nJika pemohon tetap bersikeras, mereka harus tahu bahwa Pohon Randu Putih dikuasai oleh dua entitas utama yang berusia antara dua ribu hingga empat ribu tahun. Entitas pertama adalah sosok ular putih bernama Nyai Sawer Petak. Beliau adalah abdi dari Sunan Eyang Lawu yang kerap berwujud perempuan berbusana serba putih. Entitas kedua adalah sosok ular hitam bernama Kyai Sawer Cemeng. Sosok ular hitam ini sering menampakkan wujudnya sebagai pria berbusana dominan hitam setelah perjanjian disepakati oleh pemohon yang sudah gelap mata.', 3, '2026-06-04 06:27:56', '2026-06-04 06:27:56'),
(45, 20, 'Keputusasaan yang Membawa Petaka', 'Kisah kelam dari praktik ini dialami langsung oleh keluarga Andi, yang hancur akibat krisis moneter. Terhimpit masalah ekonomi, ayah Andi mulai kehilangan arah dan sering berjudi dengan harapan mendapat uang secara mudah. Ayahnya jarang pulang ke rumah dan lebih memilih tidur di kuburan untuk mencari wangsit. Akal sehat ayahnya perlahan diambil alih oleh iklan-iklan pesugihan instan yang sering ia baca di majalah supranatural.\r\n\r\nMeskipun ibu Andi sering marah dan melarang, sang ayah tetap keras kepala. Suatu hari, sang ayah mengajak Andi pergi menemui seorang pria yang merupakan Juru Kunci. Andi dipaksa membawa tumpeng sebagai sesajian. Setibanya di lokasi, sang ayah dipersilakan oleh Juru Kunci untuk memasuki lubang besar di dalam Pohon Randu Putih. Andi hanya bisa melihat dari kejauhan dengan penuh ketakutan saat ayahnya masuk ke dalam lubang pohon gaib tersebut untuk meresmikan perjanjiannya.', 4, '2026-06-04 06:27:56', '2026-06-04 06:27:56'),
(46, 20, 'Kegilaan di Balik Kamar Rahasia', 'Setelah keluar dari pohon, ayah Andi membawa pulang salah satu bagian dari Pohon Randu Putih. Bagian pohon tersebut menyimpan residual energi yang membawa serta pasukan tak kasatmata ke dalam rumah mereka. Sebagai syarat kelanjutan pesugihan, sang ayah mengunci sebuah kamar utama di rumah mereka dan menjadikannya sebagai tempat khusus untuk ritual. Sejak saat itu, rumah yang sempit itu diubah menjadi tempat pemujaan dan hawa panas selalu menyelimuti seisi rumah.\r\n\r\nKeluarga Andi mulai mengalami teror gaib yang luar biasa mengerikan. Andi dan adik-adiknya sering melihat bayangan hitam raksasa yang berjalan gagah sambil membawa gada, serta penampakan pocong yang mengelilingi rumah mereka. Lebih mengerikan lagi adalah perubahan sikap sang ayah. Akal sehatnya benar-benar hilang; ia sering mengelus seekor ayam putih layaknya mainan baru dan kerap bergumam tidak jelas tentang \"pitik putih mulus sak prana\". Keluarga tersebut akhirnya harus hidup dalam ketakutan dan kegilaan yang tak berkesudahan akibat mengabdi pada Bank Gaib.', 5, '2026-06-04 06:27:56', '2026-06-04 06:27:56'),
(53, 23, 'Masa muda,', 'Masa muda, khususnya ketika memasuki usia 20-an, merupakan fase yang sangat krusial dan terlalu singkat untuk disia-siakan tanpa memiliki tujuan yang jelas. Pada masa keemasan ini, setiap individu dituntut untuk tidak hanya sekadar bermimpi secara abstrak, tetapi juga mulai mengonversi mimpi tersebut menjadi target nyata yang terperinci dan dapat diukur. Penulis menekankan bahwa target yang terencana dengan baik harus memiliki batas waktu pencapaian yang spesifik, yang dapat disusun menggunakan metode seperti prinsip SMART atau rumus APPLE. Selain menetapkan tujuan, membicarakan impian kepada orang terdekat dan secara rutin menuliskannya ke dalam sebuah \"catatan mimpi\" terbukti ampuh dalam menjaga motivasi serta memperbesar kemungkinan terwujudnya mimpi tersebut. Untuk menunjang langkah menuju impian, menemukan panutan atau mentor yang tepat sesuai dengan bidang yang diminati juga dianggap sebagai jalan pintas terbaik, karena seseorang dapat belajar langsung dari pengalaman keberhasilan tokoh tersebut.', 1, '2026-06-04 06:51:26', '2026-06-04 06:51:26'),
(54, 23, 'kejelasan visi masa depan', 'Selain kejelasan visi masa depan, manajemen waktu dan pembentukan kebiasaan sehari-hari merupakan fondasi utama yang akan menentukan kesuksesan seseorang di kemudian hari. Penulis sangat menyarankan kaum muda untuk mentransformasi diri menjadi \"manusia dini hari\", karena bangun lebih awal dan memanfaatkan waktu di pagi hari dapat memberikan keuntungan waktu yang luar biasa besar dalam jangka panjang. Dalam mengelola pekerjaan, metode backward scheduling—yaitu merencanakan jadwal kerja dengan menghitung mundur dari batas tenggat waktu—dinilai jauh lebih efisien untuk mencegah penundaan jika dibandingkan dengan metode penjadwalan biasa. Tidak hanya soal waktu, usia 20-an adalah momen penentu di mana seseorang harus mengikis kebiasaan buruk dan menggantinya dengan kebiasaan positif yang akan terbawa seumur hidup, seperti disiplin datang sepuluh menit lebih awal sebelum waktu berjanji, rutin membaca koran untuk memperluas wawasan umum, serta konsisten menulis buku harian sebagai sarana refleksi dan pelepasan stres.', 2, '2026-06-04 06:51:26', '2026-06-04 06:51:26'),
(55, 23, 'bekal untuk memenangkan persaingan di dunia kerja', 'Sebagai bekal untuk memenangkan persaingan di dunia kerja dan kehidupan sosial, generasi muda diwajibkan untuk membangun kualitas diri melalui cerita personal yang unik, bukan sekadar menumpuk sertifikat yang dimiliki oleh semua orang. Menguasai keterampilan praktis esensial, seperti mahir menggunakan Microsoft Excel dan PowerPoint, serta terus melatih kemampuan komunikasi dan menulis, akan menjadikan seseorang lebih siap dan bernilai di mata perusahaan. Di ranah sosial, seseorang harus berani menata ulang lingkaran pertemanannya secara berkala, mendekatkan diri dan merawat keluarga sebagai pendukung utama, serta mencari pasangan yang mampu saling mengembangkan diri. Untuk memastikan masa muda dilewati tanpa penyesalan, penulis merekomendasikan anak muda untuk berani bertamasya seorang diri guna melatih kemandirian, aktif dalam kegiatan sukarela untuk menemukan makna kebahagiaan, menjalin pertemanan dengan warga asing demi mengasah kemampuan bahasa, hingga menulis surat wasiat untuk merenungkan makna kehidupan secara lebih dalam.', 3, '2026-06-04 06:51:26', '2026-06-04 06:51:26'),
(56, 24, 'Pendahuluan: Perjalanan Karier dan Kepenulisan', 'Alvi Syahrin adalah seorang pria kelahiran Ambon pada 20 Januari 1992 yang menempuh pendidikan SMA hingga meraih gelar sarjana jurusan Teknik Informatika di UPN \"Veteran\" Jawa Timur pada tahun 2013. Semasa kuliah, ia merupakan sosok yang aktif dalam kegiatan sukarelawan, termasuk menjabat sebagai ketua tim divisi pendidikan pada program pengembangan sosial kampusnya dan mengajar bahasa Inggris di Rumah Bahasa Surabaya. Perjalanan menulisnya berawal dari keinginan sederhana untuk menyimpan cerita masa kecil, yang kemudian berkembang dari menulis lirik lagu hingga cerita fiksi remaja. Novel pertamanya yang berjudul \"Dilema\" berhasil terbit setelah ia memenangkan lomba menulis outline yang diadakan oleh penerbit Bukune pada tahun 2012, yang kemudian disusul oleh karya lain seperti \"Swiss: Little Snow in Zurich\" dan \"I Love You\". Kepeduliannya yang tinggi terhadap keresahan hidup dewasa muda akhirnya mendorong Alvi untuk menulis buku self-improvement bersama GagasMedia, menghasilkan karya best seller seperti \"Jika Kita Tak Pernah Jatuh Cinta\" (2018) dan \"Jika Kita Tak Pernah Jadi Apa-Apa\" (2019).', 1, '2026-06-04 06:56:03', '2026-06-04 06:56:03'),
(57, 24, 'Bab A: Tentang Overthinking', 'Kecemasan atau anxiety sejatinya adalah hal yang wajar dan niscaya dialami oleh setiap orang, terutama saat dihadapkan pada lingkungan baru atau saat hal-hal berjalan tidak sesuai rencana. Namun, kecemasan berubah menjadi hal yang berbahaya dan bisa mengarah pada Anxiety Disorder jika dialami secara berlebihan setiap hari, di mana hal-hal kecil pun mampu memicu ketakutan yang hebat. Untuk individu yang merasa berada di tahap ini, sangat dianjurkan untuk berkonsultasi dengan psikolog atau psikiater. Sementara itu, untuk mengatasi overthinking sehari-hari, Alvi membagikan beberapa langkah yang berpusat pada perbaikan pola pikir dan support system. Langkah tersebut meliputi kesadaran bahwa kekhawatiran buruk sering kali hanya ada di kepala dan semuanya akan kembali normal, pentingnya menciptakan skenario positif secara rasional, menahan diri untuk tidak bertindak saat sedang overthink, serta mengingat kembali doa-doa yang telah dikabulkan oleh Tuhan. Pada akhirnya, memperdalam ilmu agama dan meyakini takdir Tuhan adalah kunci esensial untuk memberikan ketenangan batin yang sejati.', 2, '2026-06-04 06:56:03', '2026-06-04 06:56:03'),
(58, 24, 'Bab B: Omongan Orang yang Menyakitkan dan Rasa Lelah', 'Ketika dihadapkan pada omongan menyakitkan dari lingkungan sekitar, memosisikan diri sebagai korban yang tersakiti oleh kejamnya dunia bukanlah cara yang tepat untuk bertumbuh. Alih-alih berhenti dan meratapi keadaan, respons yang paling tepat adalah membiarkan orang lain terus berbicara sementara kita terus melangkah maju (keep walking and growing). Perjalanan hidup sering kali terasa sangat melelahkan, layaknya setangkai bunga yang dihajar oleh ekstremnya pergantian musim, mulai dari kemarau panjang yang mengeringkan hingga badai musim dingin yang membekukan harapan. Rentetan ujian ini memang menguras energi dan kerap memunculkan dorongan untuk menyerah. Namun, kita harus selalu mengingat bahwa setelah musim dingin berlalu, musim semi pasti akan tiba untuk membuat kita kembali mekar. Oleh karena itu, kita diminta untuk bersabar sejenak, bertahan pada prinsip kebenaran, dan menyadari bahwa diri kita sebenarnya cukup kuat untuk menaklukkan setiap rintangan.', 3, '2026-06-04 06:56:03', '2026-06-04 06:56:03'),
(59, 24, 'Bab C: Haruskah Menjadi Egois Saja?', 'Terkadang, muncul rasa lelah ketika kita sudah berusaha keras menjaga perasaan orang lain, namun mereka justru bertindak semaunya dan berlindung di balik alasan sedang bad mood. Perasaan lelah ini kerap memancing godaan untuk ikut bersikap egois, setidaknya untuk satu hari saja, agar orang-orang tersebut merasakan betapa tidak menyenangkannya diabaikan. Akan tetapi, keinginan untuk membalas dendam melalui sifat egois ini harus diredam dengan sebuah perenungan mendalam: bagaimana jika hari saat kita memutuskan untuk egois ternyata adalah hari terakhir kita hidup di dunia?. Menjadi egois pada akhir hayat hanya akan menutup kesempatan kita berbuat baik dan justru menambah dosa karena menyakiti hati orang lain. Mempertahankan kebaikan di tengah lingkungan yang dipenuhi orang tanpa hati memang terasa sangat berat, tetapi orang baik adalah individu yang cerdas memandang jauh ke depan. Mereka bersabar dan menyadari bahwa balasan atas kebaikan sejati tidak selalu instan, melainkan akan diberikan kelak di akhirat.', 4, '2026-06-04 06:56:03', '2026-06-04 06:56:03'),
(60, 24, 'Bab D: Datangnya Sedih Bukan untuk Dibenci', 'Rasa sedih dan kesepian yang seolah tidak bisa dipahami oleh siapa pun adalah sebuah teguran alamiah agar kita sadar bahwa hanya Tuhan yang mampu memahami manusia secara utuh. Kesedihan yang kerap datang menghampiri di malam hari, entah karena rasa insecure atau mimpi yang gagal tercapai, tidak seharusnya langsung dicela atau diratapi tanpa henti. Sebaliknya, kita perlu menenangkan diri sejenak untuk mendengarkan pesan dan pelajaran apa yang sebenarnya ingin disampaikan oleh kesedihan tersebut. Di sisi lain, saat kita melihat kesuksesan orang lain, sering kali muncul rasa lelah karena merasa jalan kita penuh dengan kerikil dan tangga yang menimpa diri. Padahal, kehidupan para pengusaha muda sukses yang terlihat tenang di media sosial sebenarnya menyimpan beban serta tanggung jawab yang jauh lebih besar dan berkelanjutan. Daripada terus mengeluh dan mengharapkan kesempurnaan di dunia yang fana ini, kita sebaiknya merenovasi sudut pandang kita, mencari celah untuk mencintai apa yang kita kerjakan, dan tidak mudah menyerah pada realita.', 5, '2026-06-04 06:56:03', '2026-06-04 06:56:03'),
(61, 25, 'Bagian I: Pembacaan Wajah (Fisiognomi) dari Masa ke Masa', 'Sejarah ilmu fisiognomi memiliki akar yang sangat panjang dan bermula dari berbagai peradaban kuno di dunia. Di India, ilmu ini diperkirakan sudah ada sejak 3000 SM dan banyak tercermin dalam epos pewayangan seperti Ramayana dan Mahabarata, di mana karakter baik dan buruk digambarkan dengan bentuk fisik dan wajah yang kontras. Sementara itu, di Tiongkok, pembacaan wajah mulai dikenal sejak abad ke-6 SM dan awalnya digunakan oleh para tabib sebagai alat diagnosis medis yang sangat rumit dengan membagi wajah ke dalam 130 area. Di dunia Barat, fisiognomi dikembangkan dari filsafat praktis tokoh Yunani seperti Aristoteles, lalu dipopulerkan oleh Johann Caspar Lavater pada abad ke-18 yang meyakini watak seseorang terlihat dari profilnya. Pada abad ke-20, tokoh seperti Edward Vincent Jones dan Paul Ekman membawa pendekatan ilmiah ke dalam fisiognomi, membuktikan bahwa perbedaan wajah dan micro expression (gerakan otot halus di sekitar mata dan dahi) adalah instrumen komunikasi tak kasat mata yang secara akurat mengungkap emosi, suasana hati, dan pikiran seseorang.', 1, '2026-06-04 07:01:17', '2026-06-04 07:01:17'),
(62, 25, 'Bagian II: Instrumen-Instrumen Wajah', 'Secara mendasar, kajian fisiognomi kontemporer membagi wajah manusia ke dalam tiga zona instrumen utama yang masing-masing mengungkapkan dimensi kejiwaan yang berbeda. Bagian pertama bermula dari garis tepian rambut hingga dahi, yang berfungsi untuk mengungkapkan ide, gagasan, dan gaya berpikir metodologis seseorang. Bagian kedua membentang dari alis hingga mulut, yang merepresentasikan ungkapan hati, perasaaan, penguasaan spiritual, dan bagaimana seseorang menerima serta memberi kasih sayang. Bagian ketiga mencakup area dagu dan rahang, yang merupakan cerminan dari semangat juang, stamina, kekuatan kemauan, serta dorongan hati dalam mencapai impian. Selain itu, bagian ini juga menekankan bahwa wajah manusia pada dasarnya asimetris; sisi kanan menunjukkan keadaan duniawi (karier, asmara, tekanan hidup), sementara sisi kiri mencerminkan tingkat spiritualitas dan pengelolaan emosi yang sesungguhnya.', 2, '2026-06-04 07:01:17', '2026-06-04 07:01:17'),
(63, 25, 'Bagian III: Membaca Instrumen Wajah', 'Setiap instrumen di wajah manusia menyimpan makna spesifik tentang karakter dasarnya jika dianalisis secara terperinci.  Kepala dan Rambut: Tonjolan kepala dan tekstur rambut melambangkan kekuatan diri, keberanian, hingga tingkat ketahanan tubuh seseorang dalam menghadapi tekanan hidup.  Mata dan Dahi: Jarak antar mata, bentuk kelopak, serta bentuk dahi menunjukkan bagaimana seseorang memandang masalah, memproses informasi, dan seberapa toleran atau perfeksionisnya mereka.  Hidung dan Filtrum: Hidung berhubungan erat dengan kecerdasan intelektual, kemampuan negosiasi, dan kepedulian, sedangkan filtrum (lekukan di atas bibir) menunjukkan daya tahan serta keterbukaan terhadap kritik.  Bibir, Mulut, dan Dagu: Bentuk bibir mengomunikasikan kecakapan bersosialisasi dan keintiman, ukuran mulut menggambarkan kemampuan manajemen, sementara dagu dan rahang sangat berkaitan dengan stamina, kegigihan, dan seberapa keras kepala atau mandirinya individu tersebut.  Pipi, Telinga, dan Gigi: Pipi mencerminkan kewibawaan sosial, letak dan bentuk telinga merujuk pada tingkat kecerdasan dan kemampuan mendengar, serta susunan gigi yang menunjukkan pola dan gaya hidup seseorang sejak masa kanak-kanak.', 3, '2026-06-04 07:01:17', '2026-06-04 07:01:17'),
(64, 25, 'Bagian IV: Pembacaan Wajah Laki-laki dan Perempuan', 'Meskipun instrumen wajahnya sama, pembacaan watak antara laki-laki dan perempuan memiliki penafsiran yang berbeda karena perbedaan kebiasaan dan karakteristik bawaan gender. Pada laki-laki, elemen fisik seperti tinggi tubuh, bentuk kepala, rambut (termasuk kumis dan janggut), serta rahang yang besar sangat menentukan seberapa gigih, dinamis, dan mandirinya ia dalam memperjuangkan status serta keluarganya. Sebaliknya, pada perempuan, bentuk wajah, kerutan dahi, bibir, serta pipi lebih banyak menunjukkan sifat emosional, keanggunan, insting keibuan, hingga kecerdasan dalam memanajemen hubungan sosial dan keharmonisan rumah tangga. Keduanya tidak bisa dinilai murni dari seberapa tampan atau cantiknya wajah tersebut, melainkan dari proporsi dan keunikan masing-masing instrumen yang merepresentasikan kekuatan, kelemahan, serta masa depan mereka.', 4, '2026-06-04 07:01:17', '2026-06-04 07:01:17'),
(65, 25, 'Bagian V: Membaca Emosi Orang Lain dari Raut Wajah', 'Manusia memiliki ragam emosi yang berubah-ubah yang diciptakan oleh perpaduan pengetahuan dan kondisi psikologis, di mana wajah adalah kanvas utamanya. Menurut Daniel Goleman, terdapat delapan macam emosi dasar seperti marah, sedih, takut, nikmat, cinta, terkejut, jengkel, dan malu. Emosi bahagia mudah terbaca melalui sudut bibir yang naik dan mata berbinar. Sebaliknya, emosi amarah ditunjukkan oleh alis bagian dalam yang menyatu, bibir menyempit, dan pandangan mata tajam. Kesedihan tergambar dari mata yang tidak fokus serta kelopak mata yang terkulai, sedangkan rasa takut memicu kedua alis naik secara bersamaan dan kelopak mata menegang. Membaca raut wajah ini sangat berguna untuk beradaptasi di lingkungan sosial agar interaksi berjalan efektif dan penuh empati.', 5, '2026-06-04 07:01:17', '2026-06-04 07:01:17'),
(66, 25, 'Bagian VI: Membaca Kebohongan dari Raut Wajah', 'Berbohong, meskipun sering dilakukan untuk menutupi kenyataan atau melindungi perasaan orang lain, pasti akan memicu respons tubuh tanpa sadar yang bisa dibaca melalui ekspresi. Kebohongan dapat dilihat dari gerakan mata yang cenderung melirik ke kanan atas (mengakses otak kanan untuk menciptakan imajinasi/kebohongan) atau kedipan mata yang menjadi terlalu cepat akibat keresahan batin. Otak yang panik juga mengirim impuls ke tangan untuk secara refleks menyentuh atau mengusap hidung dan mulut guna menutupi kata-kata dusta. Isyarat vokal yang tiba-tiba berubah gemetar, nada bicara meninggi, serta senyum palsu yang tidak mencapai mata (hanya menarik sudut bibir) adalah bukti kuat bahwa seseorang sedang menyembunyikan kebenaran, fitnah, atau sekadar mempraktikkan budaya \'Asal Bapak Senang\'.', 6, '2026-06-04 07:01:17', '2026-06-04 07:01:17'),
(67, 25, 'Bagian VII: Menghadapi Mereka yang Berbohong', 'Menghadapi seseorang yang terbukti berbohong memerlukan kepala dingin, rasionalitas, dan kebijaksanaan, alih-alih meresponsnya dengan kepanikan atau balasan kasar. Langkah pertama adalah mencoba mencari tahu penyebab di balik kebohongan tersebut, apakah karena tekanan jiwa, rasa takut, atau untuk menjaga perasaan. Langkah selanjutnya adalah mengungkapkan perasaan jujur bahwa Anda merasa terluka atau kecewa karena dibohongi, sehingga si pembohong sadar akan konsekuensi tindakannya. Pada akhirnya, Anda memiliki pilihan rasional: memaafkan dan membangun kembali batasan serta kepercayaan perlahan-lahan, atau—jika kebohongan tersebut sangat fatal dan terus berulang—memutuskan untuk mengakhiri hubungan persahabatan demi kesehatan mental Anda sendiri.', 7, '2026-06-04 07:01:17', '2026-06-04 07:01:17'),
(68, 26, 'Bab 1: Rumah Aneh', 'Kisah bermula ketika seorang kenalan tokoh utama, Yanaoka, meminta pendapat mengenai denah sebuah rumah dua lantai di Tokyo yang hendak ia beli. Di lantai satu rumah tersebut, terdapat sebuah \"ruangan misterius\" yang tidak memiliki pintu maupun akses masuk dari luar. Sang tokoh utama kemudian berkonsultasi dengan Kurihara, seorang arsitek profesional sekaligus penggemar misteri, yang segera menemukan lebih banyak keganjilan ekstrem di lantai dua: sebuah kamar anak tanpa jendela yang diapit pintu rangkap dan dilengkapi toilet pribadi, seolah difungsikan sebagai sel tahanan. Kurihara membangun hipotesis liar namun mengerikan bahwa rumah tersebut sengaja dirancang secara khusus untuk memfasilitasi pembunuhan, di mana anak yang dipasung digunakan sebagai eksekutor rahasia, lalu jasad korbannya disingkirkan melalui lorong tersembunyi. Misteri ini kian mencekam ketika Yanaoka batal membeli rumah tersebut usai melihat berita penemuan mayat termutilasi di daerah sekitar, di mana bagian pergelangan tangan kiri mayat tersebut dinyatakan hilang.', 1, '2026-06-04 07:05:42', '2026-06-04 07:05:42'),
(69, 26, 'Bab 2: Denah yang Tak Lazim', 'Setelah tokoh utama merilis artikel anonim mengenai rumah aneh tersebut, ia dihubungi oleh seorang wanita yang mengaku bernama Miyae Yuzuki, yang mengklaim sebagai istri dari korban mutilasi (Miyae Kyoichi) yang pergelangan tangan kirinya terpotong. Wanita itu memperlihatkan denah rumah lain di wilayah Prefektur Saitama yang pernah dijual dua tahun sebelumnya, yang tata letaknya memiliki kemiripan struktur ruang rahasia dengan rumah di Tokyo, ditambah dengan keberadaan \"ruangan segitiga\" yang tidak berfungsi. Melalui analisis mendalam Kurihara yang menilik sejarah pemancangan dan bentuk lahan, terungkap bahwa ruangan segitiga di Saitama tersebut dibangun secara terpaksa guna menutupi akses rahasia menuju ruang bawah tanah, tempat mayat disembunyikan. Penyelidikan berlanjut saat Kurihara menemukan fakta bahwa korban (Miyae Kyoichi) berstatus lajang; fakta ini memaksa sang wanita untuk mengakui identitas aslinya sebagai Katabuchi Yuzuki, adik kandung dari Ayano yang merupakan pemilik asli rumah pembantaian di Tokyo tersebut.', 2, '2026-06-04 07:05:42', '2026-06-04 07:05:42'),
(70, 26, 'Bab 3: Tata Letak Ruang dalam Ingatan', 'Katabuchi Yuzuki kemudian menceritakan sejarah masa lalunya yang kelam dan memberikan sketsa denah rumah kakeknya, Shigeharu, yang digambar murni dari ingatan masa kecilnya. Di dalam rumah lawas bergaya tradisional Jepang yang sangat simetris tersebut, sepupu Yuzuki yang bernama Yo-chan pernah tewas secara misterius di depan sebuah altar Buddha raksasa berwarna hitam. Kurihara kembali membedah tata letak rumah itu secara arsitektural dan memecahkan trik dua pasang pintu geser serta celah tersembunyi di belakang altar, membuktikan adanya \"kamar pasungan\" orisinal yang digunakan keluarga untuk menyembunyikan seseorang dan memfasilitasi jalur pembunuhan rahasia. Kematian Yo-chan yang dahulu disepakati oleh keluarga sebagai kecelakaan akibat terjatuh dari altar, dibongkar oleh Kurihara sebagai sebuah skenario pembunuhan yang sengaja disamarkan untuk menutupi dan melindungi rahasia keberadaan lorong maut keluarga Katabuchi tersebut.', 3, '2026-06-04 07:05:42', '2026-06-04 07:05:42'),
(71, 26, 'Bab 4: Keluarga yang Terbelenggu', 'Guna mencari kebenaran, Yuzuki dan tokoh utama menemui ibu Yuzuki, Yoshie, yang akhirnya membuka tabir sejarah gelap keluarga Katabuchi melalui sebuah dokumen kuno dan surat pengakuan dari suami Ayano, Katabuchi Keita. Surat itu membongkar bahwa keluarga Katabuchi selama puluhan tahun diikat oleh ritual gila bernama \"Persembahan Tangan Kiri\" akibat dendam masa lalu, di mana setiap anak yang terlahir cacat tanpa tangan kiri akan dipasung dan dicuci otaknya untuk membunuh keturunan keluarga cabang serta memotong tangan kiri korban sebagai persembahan altar. Keita dalam suratnya menjelaskan bahwa ia dan Ayano berpura-pura mematuhi ritual itu demi melindungi anak malang (Toya) dan anak kandung mereka (Hiroto), menggunakan jasad pria yang tewas bunuh diri (Miyae Kyoichi) untuk mengecoh keluarga tanpa harus melakukan pembunuhan. Ketika tipu daya kemanusiaan ini pada akhirnya terbongkar oleh sang kakek, Keita mengambil langkah ekstrem mengorbankan dirinya dengan membunuh Shigeharu dan sang pengawas (Kiyotsugu), agar istri dan anak-anaknya bisa memutus rantai kutukan mengerikan itu selamanya.', 4, '2026-06-04 07:05:42', '2026-06-04 07:05:42'),
(72, 27, 'BAB 1: TITAH SANG RAJA', 'Ruang ganti stadion malam itu lebih hening dari biasanya. Udara terasa dingin, bukan karena pendingin ruangan, melainkan karena aura ketegangan yang menguar saat pintu kayu ek didorong terbuka secara kasar.\r\n\r\nKylian melangkah masuk. Ia tidak mengenakan jaket seragam tim seperti rekan-rekannya, melainkan setelan jas hitam desainer ternama. Ketukan sepatu kulitnya di lantai menciptakan gema yang membuat para pemain muda secara refleks menundukkan kepala.\r\n\r\nDi depan papan taktik, Pelatih Kepala yang baru direkrut tiga minggu lalu—seorang taktikawan senior dari Spanyol—berdiri dengan spidol di tangan yang sedikit gemetar.\r\n\r\n\"Selamat malam, Kylian,\" sapa sang pelatih, memaksakan senyum ramah.\r\n\r\nKylian tidak membalas sapaan itu. Matanya yang tajam langsung tertuju pada papan tulis putih. Formasi 4-3-3 tergambar rapi di sana. Ia melangkah maju, merebut spidol dari tangan pelatihnya tanpa permisi, dan memberikan coretan tebal berwarna merah pada nama striker asal Amerika Selatan yang tertulis di sayap kiri.\r\n\r\n\"Mulai besok, dia berlatih dengan tim cadangan,\" ucap Kylian dingin, suaranya membelah keheningan ruangan. \"Dan jual dia di bursa transfer musim dingin. Aku tidak ingin melihat wajahnya di tempat latihanku.\"\r\n\r\nHening. Sang kapten tim, seorang bek veteran yang biasanya disegani, mencoba angkat bicara, \"Kylian, dia pencetak gol terbanyak kedua kita. Kita membutuhkannya untuk pertandingan krusial besok lusa.\"\r\n\r\nKylian menoleh perlahan. Tatapannya sedingin es, menembus mata sang kapten.\r\n\r\n\"Di tim ini, tidak ada yang lebih dibutuhkan selain menuruti taktikku. Dia tidak mengoper bola padaku di menit ke-89 pekan lalu padahal aku berdiri bebas. Di kerajaanku, pengkhianatan taktis dibayar dengan pengasingan.\"\r\n\r\nKylian membuang spidol itu ke lantai hingga berderak. Ia menatap ke seluruh penjuru ruang ganti. Pemain, staf medis, hingga asisten pelatih tak ada satu pun yang berani membalas tatapannya.\r\n\r\nMalam itu, semua yang ada di ruangan menyadari satu hal yang pasti: Kylian bukan lagi sekadar penyerang bernomor punggung tujuh. Ia adalah dewan direksi, pelatih, sekaligus eksekutor mutlak. Sang Diktator telah bertakhta.', 1, '2026-06-04 07:10:15', '2026-06-04 07:10:15'),
(73, 27, 'BAB 2: PEMBERONTAKAN BAWAH TANAH', 'Di sebuah restoran tertutup di pinggiran kota, jauh dari sorotan kamera paparazzi dan mata-mata manajemen klub, sepuluh pemain berkumpul. Udara dipenuhi asap cerutu dan ketegangan. Sang Kapten duduk di ujung meja, menatap rekan-rekannya yang tampak frustrasi. Di sebelahnya, sang penyerang asal Amerika Selatan yang baru saja dibuang ke tim cadangan menenggak air putihnya dengan kasar.\r\n\r\n\"Kita tidak bisa membiarkan ini berlanjut,\" desis sang penyerang. \"Dia bukan lagi rekan setim. Dia adalah bos yang tiran. Jika kita diam, besok giliran kalian yang karirnya dihancurkan hanya karena tidak mengumpan padanya.\"\r\n\r\nSang Kapten menghela napas panjang, menatap satu per satu pemain kunci di ruangan itu. Gelandang tengah, bek sayap, hingga penjaga gawang utama—semua hadir.\r\n\r\n\"Kita punya pertandingan final turnamen Eropa minggu depan,\" ucap Sang Kapten dengan suara berat. \"Jika kita memboikot latihan, klub akan mendenda kita. Tapi jika kita memboikotnya di atas lapangan... dunia akan melihat siapa yang sebenarnya memegang kendali atas tim ini.\"\r\n\r\nRencana rahasia pun disepakati. Mereka tidak akan melawan Kylian dengan kata-kata atau konferensi pers, melainkan dengan senjata paling mematikan di sepak bola: isolasi.', 2, '2026-06-04 07:10:15', '2026-06-04 07:10:15'),
(74, 27, 'BAB 3: GEMA KETIDAKPUASAN', 'Kebocoran informasi adalah musuh terbesar seorang diktator. Entah dari mana asalnya, klausul-klausul rahasia dalam kontrak Kylian bocor ke media. Publik mengetahui bahwa sang bintang memiliki hak veto atas transfer pemain dan pemecatan pelatih.\r\n\r\nKeesokan harinya, saat sesi pemanasan di stadion kandang, atmosfer terasa mencekam. Kelompok Ultras klub, yang biasanya menyanyikan nama Kylian, kini membentangkan spanduk raksasa berwarna hitam bertuliskan huruf merah darah:\r\n\r\n\"TIDAK ADA RAJA DI KLUB KAMI. LOGO DI DADA LEBIH BESAR DARI NAMA DI PUNGGUNG!\"\r\n\r\nKylian menatap spanduk itu dengan rahang mengeras. Ia segera menghampiri Presiden Klub yang duduk di tribun VVIP.\r\n\r\n\"Singkirkan spanduk itu, atau aku tidak akan bermain!\" ancam Kylian.\r\n\r\nNamun, untuk pertama kalinya, Sang Presiden Klub tampak ragu. Tekanan dari suporter, sponsor, dan walikota membuat posisinya terjepit. \"Kylian, bermainlah. Buktikan mereka salah di lapangan,\" jawab presiden dengan suara pelan.\r\n\r\nKylian mendengus kesal. Ia tidak menyadari bahwa penolakan kecil dari presiden itu adalah retakan pertama dari runtuhnya kerajaannya.', 3, '2026-06-04 07:10:15', '2026-06-04 07:10:15'),
(75, 27, 'BAB 4: PENGKHIANATAN DI LAPANGAN HIJAU', 'Malam final Eropa tiba. Sorot lampu stadion menyilaukan, dan jutaan pasang mata dari seluruh dunia menatap ke arah lapangan. Namun, sesuatu yang sangat ganjil terjadi sejak peluit babak pertama dibunyikan.\r\n\r\nKylian berlari mencari ruang. Ia melambaikan tangan, meminta bola. Namun, gelandang tengah justru mengumpan ke sayap kanan. Kylian berteriak, merangsek ke kotak penalti, tetapi bola justru dioper kembali ke belakang oleh Sang Kapten.\r\n\r\nMenit ke-20. Menit ke-40. Menit ke-60.\r\nKylian sama sekali tidak menyentuh bola. Ia berlari seperti hantu di tengah lapangan. Sebanyak apa pun ia meminta, rekan-rekannya seolah buta dan tuli terhadap keberadaannya. Mereka bermain seolah tim hanya terdiri dari sepuluh orang.\r\n\r\nFrustrasi memuncak, Kylian menghampiri pinggir lapangan dan berteriak kepada sang pelatih, \"Suruh mereka mengumpan padaku! Aku yang mengatur klub ini!\"\r\n\r\nSang pelatih asal Spanyol itu menatap Kylian. Ketakutan yang selama ini menghantuinya lenyap saat melihat kekompakan sebelas pemain di lapangan. Ia melirik papan pergantian pemain, lalu memberi kode kepada asistennya.\r\n\r\nPada menit ke-70, papan elektronik digital diangkat. Nomor 7 berwarna merah.\r\n\r\nKylian diganti.\r\n\r\nSeluruh stadion terdiam, lalu bergemuruh dalam sorakan dan tepuk tangan. Bukan untuk Kylian, melainkan untuk keberanian sang pelatih. Wajah Kylian memerah. Ia menolak menjabat tangan pelatih dan langsung berjalan masuk ke lorong ruang ganti, meninggalkan kerajaannya yang runtuh.', 4, '2026-06-04 07:10:15', '2026-06-04 07:10:15'),
(76, 27, 'BAB 5: MAHKOTA YANG HILANG (TAMAT)', 'Pagi hari setelah kekalahan memalukan di final, ruang konferensi pers klub disesaki oleh ratusan jurnalis. Duduk di depan mikrofon, Sang Presiden Klub tampak lelah namun lega. Di sebelahnya tidak ada Kylian.\r\n\r\n\"Setelah diskusi panjang malam tadi, pihak klub dan Kylian sepakat untuk mengakhiri kontrak secara kekeluargaan. Kami berterima kasih atas gol-golnya, namun klub ini harus kembali menjadi sebuah tim, bukan entitas milik satu individu.\"\r\n\r\nDi tempat lain, di landasan pacu bandara jet pribadi, Kylian berdiri menatap layar ponselnya. Tidak ada pesan simpati dari rekan setimnya. Tidak ada pelatih yang memohonnya tinggal. Hanya agen dan pengacaranya yang sibuk menelepon klub-klub lain.\r\n\r\nKylian naik ke dalam jet, menatap lapangan hijau dari balik jendela kecil pesawat yang mulai lepas landas. Ia telah mencetak ratusan gol, memecahkan berbagai rekor, dan memiliki kekuasaan yang tak tertandingi. Namun di akhir hari, ia belajar sebuah pelajaran pahit yang selama ini ia lupakan:\r\n\r\nSebuah mahkota tidak ada artinya jika sang raja tidak memiliki rakyat yang mau berjuang bersamanya. Diktator lapangan hijau itu akhirnya pergi, meninggalkan takhta yang hancur oleh keangkuhannya sendiri.', 5, '2026-06-04 07:10:15', '2026-06-04 07:10:15'),
(77, 28, 'Tukang kayu', 'jokowi sering membantu bapaknya', 1, '2026-06-04 18:48:23', '2026-06-04 18:48:23'),
(82, 29, 'adkowmkawawdjnjawd', 'dawjnawd', 1, '2026-06-04 20:00:36', '2026-06-04 20:00:36'),
(83, 21, 'Mitos, Kematian, dan Bangkitnya Qorin', 'Kematian seringkali dianggap sebagai akhir, namun dalam banyak kepercayaan masyarakat Jawa, kematian bisa menjadi awal bangkitnya suatu kekuatan gaib. Di Indonesia, pocong adalah salah satu entitas hantu yang paling populer dan ditakuti, berwujud jenazah yang terbungkus kain kafan dengan wajah membusuk dan mata memancarkan warna merah. Dalam ajaran Islam, membungkus jenazah dengan kain kafan (pocong) adalah metode penguburan yang wajib dilakukan.  Mitos yang beredar luas menyebutkan bahwa jika simpul tali pocong tidak dilepaskan saat dikubur, jenazah tersebut tidak akan disempurnakan di alam kuburnya dan akan bergentayangan. Namun, sosok yang bergentayangan tersebut sebenarnya bukanlah arwah orang yang meninggal, melainkan jin qorin manusia yang tertinggal di dunia. Jin qorin adalah jin yang mendampingi manusia sejak lahir hingga kematiannya, merekam segala memori, sifat, dan kebiasaan tuannya.  Dalam kasus tertentu, seseorang justru dengan sengaja meminta agar tali pocongnya tidak dilepas. Ada sebuah kisah dari sudut Kota Yogyakarta tentang seorang dukun ilmu hitam yang mati akibat pertarungan supranatural. Dukun tersebut meninggalkan wasiat agar ikatan tali pocongnya tidak dilepas, kecuali bagian kepalanya. Wasiat mengerikan inilah yang membuat jin qorin-nya menjelma menjadi sosok Pocong Gundul berkepala tengkorak dengan gigi bertaring, yang memiliki kekuatan gaib luar biasa berkat persekutuannya dengan jin jahat.', 1, '2026-06-04 20:08:23', '2026-06-04 20:08:23'),
(84, 21, 'Teror di Balik Sumur Tua Sekolah', 'Teror Pocong Gundul berpusat di sebuah sekolah kejuruan di Yogyakarta yang konon didirikan di atas bekas pemakaman. Pemakaman tersebut telah dipindahkan ke utara dan selatan sekolah, termasuk makam dari dukun ilmu hitam yang menjadi cikal bakal Pocong Gundul.  Seorang mantan siswi angkatan sembilan puluhan bernama Sari menjadi saksi sekaligus mediator atas rentetan kejadian ganjil di sekolah tersebut. Pada awalnya, di pojok lapangan sekolah terdapat sebuah sumur tua yang ditutupi oleh pohon waru besar yang rimbun dan wingit. Kakak tingkat sering menakut-nakuti murid baru bahwa dedemit penghuni kuburan sering bermain di sumur tersebut.  Konflik mistis mulai memuncak ketika pihak sekolah memutuskan untuk membongkar dan menimbun sumur tua tersebut, serta menebang pohon waru untuk membangun mimbar upacara. Beberapa hari setelah pembangunan selesai, serangkaian peristiwa ganjil dan di luar nalar mulai menyerang. Penampakan siluman ular semakin sering terjadi, dan puncaknya adalah sosok Pocong Gundul yang menampakkan diri di lorong toilet pria, menatap tajam hingga membuat korbannya kaku ketakutan.', 2, '2026-06-04 20:08:23', '2026-06-04 20:08:23'),
(85, 21, 'Jerit Kematian dan Kesurupan Massal', 'Dampak dari penimbunan sumur tua tersebut tidak main-main. Pocong Gundul tidak hanya menakut-nakuti, tetapi memiliki energi kuat yang mampu mendorong manusia menuju puncak emosi hingga kehilangan akal sehat. Korban pertama dari kekalutan ini adalah Bu Astri, seorang guru magang di sekolah tersebut.  Suatu hari, Sari melihat penampakan Bu Astri sedang menjahit di ruang praktik tata busana dengan rambut terurai panjang menutupi wajahnya. Hal ini sangat ganjil karena Bu Astri adalah guru tata boga. Tak lama setelah penampakan itu, jeritan histeris memecah suasana dari ruang kesenian. Bu Astri ditemukan tergeletak tewas di samping gong dengan mulut berbusa setelah menenggak racun serangga akibat depresi dan patah hati.  Kejadian bunuh diri ini memicu huru-hara yang lebih besar. Pada hari Jumat, saat sekolah mengadakan upacara, seorang murid menjerit histeris karena melihat arwah Bu Astri berdiri di antara barisan guru. Teriakan itu menular dengan cepat ke kelas Tata Boga, di mana belasan murid mulai menjerit, menangis, dan menari tak beraturan. Kesurupan massal ini mayoritas menyerang murid perempuan, karena secara metafisik, katub batin perempuan lebih mudah terbuka akibat fluktuasi emosi.', 3, '2026-06-04 20:08:23', '2026-06-04 20:08:23'),
(86, 21, 'Nyawa yang Direnggut di Jalanan', 'Teror Pocong Gundul terus mengintai nyawa para murid, termasuk Sari dan seorang siswi lain bernama Ratih. Sari, yang terus-menerus dihantui penampakan Pocong Gundul, mengalami sleep paralysis (tindihan) di ruang UKS. Sosok Pocong Gundul melayang tepat di atas tubuhnya, menatapnya dengan mata bernanah dan liur menetes.  Siksaan psikologis ini membuat Sari kurang tidur, kelelahan, dan kehilangan konsentrasi. Pada hari ke-40 sejak ia pertama kali dihantui, Sari berangkat sekolah dengan terburu-buru menggunakan motor. Dalam kondisi mengantuk di jalan lurus, ia terkejut oleh sesosok bayangan yang menyeberang cepat, membuatnya banting setir dan terserempet mobil. Nahas, sebuah bus Kopata dari belakang tak sempat mengerem dan langsung menggilas perutnya hingga ia tewas di tempat.  Korban lainnya, Ratih, menceritakan tragedi nahas yang menimpanya saat rombongan sekolah hendak melakukan kegiatan Persami di Kaliurang. Truk yang membawa puluhan murid tiba-tiba melaju kencang dan tergelincir masuk ke jurang. Menurut pengakuan sopir yang selamat, ia membanting setir ke kiri untuk menghindari sosok makhluk (yang diduga kuat adalah Pocong Gundul) di tikungan tajam. Kecelakaan maut itu merenggut banyak nyawa murid, termasuk Ratih yang mengalami patah leher.', 4, '2026-06-04 20:08:23', '2026-06-04 20:08:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_04_030704_create_posts_table', 1),
(5, '2026_05_06_050153_create_chapters_table', 1),
(6, '2026_05_11_070910_add_role_to_users_table', 2),
(7, '2026_05_25_021632_add_photo_to_users_table', 3),
(11, '2026_05_25_025537_create_chapters_table', 4),
(12, '2026_05_28_203819_change_genre_column_on_posts_table', 4),
(13, '2026_05_28_212053_make_content_nullable_on_posts_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `sinopsis` text NOT NULL,
  `genre` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`genre`)),
  `status` enum('publik','privat') NOT NULL DEFAULT 'privat',
  `is_draft` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `cover`, `sinopsis`, `genre`, `status`, `is_draft`, `created_at`, `updated_at`) VALUES
(19, 1, 'Kisah Tanah Jawa : Jagat Lelembut', NULL, 'covers/tne53WWHWiDU6DyuzKtHhUvnGzzyyBTtwIyvyqBB.jpg', 'Masyarakat Jawa sejak zaman dulu dikenal sebagai masyarakat yang dekat dengan kehidupan spiritual. Pada dasarnya, masyarakat Jawa bisa dibilang selalu dalam pencariannya terhadap suatu kebenaran sejati. Sebuah hakikat hidup yang biasa ditebus dengan laku prihatin untuk mencari sebuah kesejatian yang dinamakan \"kaweruh\". Tujuan utama dari mencari \"kaweruh\" sendiri adalah untuk mencari keselamatan baik di dunia maupun akhirat.', '[\"Horor\"]', 'publik', 0, '2026-06-04 05:55:05', '2026-06-04 05:55:05'),
(20, 1, 'Kisah Tanah Jawa : Bank Gaib', NULL, 'covers/WDLamYppJMC5UMDtiVZGMrb524NHYWSB5vJPNBJK.jpg', 'Kisah ini menelusuri sisi gelap dari fenomena pesugihan di Tanah Jawa yang didorong oleh keserakahan manusia akan harta duniawi. Segala kekayaan instan ini dikelola oleh sebuah institusi metafisik yang dikenal sebagai Bank Gaib. Berpusat pada sebuah Pohon Randu Putih kuno yang dijaga oleh entitas ular raksasa, manusia menukarkan jiwa dan akal sehat mereka demi kekayaan fana.', '[\"Horor\"]', 'publik', 0, '2026-06-04 06:27:43', '2026-06-04 06:27:56'),
(21, 1, 'Kisah Tanah Jawa: Pocong Gundul', NULL, 'covers/BzoR9aFkwd9fjhmYJSz71bEGTAKu1v3AdSgeSROX.jpg', 'mengupas teror mistis yang menyelimuti sebuah sekolah kejuruan di Yogyakarta. Teror ini berpusat pada sosok gaib mengerikan bernama Pocong Gundul, yang sebenarnya adalah manifestasi qorin dari seorang dukun ilmu hitam sakti bernama Walisdi. Semasa hidupnya, Walisdi memiliki masa lalu yang sangat kelam dan penuh dendam akibat siksaan ayah kandungnya. Kematiannya yang tidak wajar—dengan wasiat agar tali pocong di kepalanya tidak dilepas—melahirkan entitas jahat yang terus meminta tumbal.', '[\"Horor\",\"Fantasi\"]', 'publik', 0, '2026-06-04 06:36:54', '2026-06-04 20:08:23'),
(23, 2, 'Menata Karier dan masa depan di umur 20 an', NULL, 'covers/7R62smuYEBWZh9J5wVyNgjVsHTSrTn9eouMwe9aH.jpg', 'Buku \"Hidup Antigalau: Menata Karier dan Masa Depan di Umur 20-an\" karya Juhyung Kim merupakan panduan pengembangan diri yang dirancang khusus untuk membimbing kaum muda. Ditulis berdasarkan pengalaman pribadi penulisnya saat menghadapi berbagai kebingungan di usia 20-an,', '[\"Drama\"]', 'publik', 0, '2026-06-04 06:51:26', '2026-06-04 06:51:26'),
(24, 2, 'Belajar Meningkatkan Kualitas Diri', NULL, 'covers/l0aZZpNnfC5kYAtuSgUmOgBXXpHGGcMUDZwmIf3J.jpg', 'Buku atau catatan \"Belajar Meningkatkan Kualitas Diri dari Alvi Syahrin\" merangkum perjalanan hidup dan pemikiran sang penulis dalam menghadapi berbagai keresahan khas remaja dan dewasa muda. Dimulai dari profil Alvi yang beralih dari penulis fiksi menjadi penulis buku pengembangan diri (self-improvement) populer, teks ini membedah berbagai masalah mental dan emosional sehari-hari.', '[\"Fantasi\"]', 'publik', 0, '2026-06-04 06:56:03', '2026-06-04 06:56:03'),
(25, 2, 'Membaca Ekspresi Wajah', NULL, 'covers/oRApbp9GCbXEGjDDhYkkF3Tsf07pQc1CNAWOr3Qb.jpg', 'Buku \"Membaca Ekspresi Wajah\" karya Kaputra Amda dan Ratna Fitriyani mengupas tuntas ilmu fisiognomi, yakni seni membaca kepribadian, watak, dan emosi seseorang melalui instrumen wajah. Buku ini membahas sejarah perkembangan fisiognomi, pembagian zona wajah, perbedaan karakter spesifik antara laki-laki dan perempuan, hingga teknik aplikatif untuk mendeteksi emosi serta kebohongan seseorang hanya dengan mengamati raut wajah dan bahasa tubuh mereka', '[\"Thriller\"]', 'publik', 0, '2026-06-04 07:01:17', '2026-06-04 07:01:17'),
(26, 5, 'Teka-Teki Rumah Aneh', NULL, 'covers/Ujmm9VfR4XjAUzPLGgV1sTkFBv41vGXItVna74Ix.jpg', 'Buku \"Teka-Teki Rumah Aneh\" (Henna Ie) karya Uketsu mengisahkan investigasi seorang penulis lepas spesialis okultisme terhadap sebuah denah rumah biasa yang ternyata menyembunyikan keganjilan arsitektural. Bersama rekannya yang seorang arsitek bernama Kurihara, sang penulis membedah tata letak ruang rahasia dari beberapa rumah yang berujung pada penemuan tradisi kelam, kutukan, dan ritual pembunuhan berantai lintas generasi dari sebuah keluarga bernama Katabuchi.', '[\"Thriller\"]', 'publik', 0, '2026-06-04 07:05:42', '2026-06-04 07:05:42'),
(27, 5, 'Mbappe Sang Diktator', NULL, 'covers/Q7EGwBIA9hTqKKgDWufFxjfyXpooqG8FAkEphG7Z.jpg', 'Sepak bola bukan lagi sekadar permainan sebelas lawan sebelas, melainkan panggung politik dan kekuasaan mutlak. Berawal dari penandatanganan perpanjangan kontrak yang fantastis, Kylian tidak lagi hanya menjadi ujung tombak tim, melainkan \'Presiden Bayangan\' di ibu kota Prancis. Ia mengatur bursa transfer, memecat pelatih sesuka hati, dan menyingkirkan siapa pun yang berani menentang egonya.', '[\"Aksi\"]', 'publik', 0, '2026-06-04 07:10:15', '2026-06-04 07:10:15'),
(28, 1, 'Jokowi si tukang kayu', NULL, 'covers/M6rFbhRLoYyq7A1eyR876Y7IoK3ESzMaJxsIUBM2.jpg', 'perjalanan jokowi', '[\"Komedi\",\"Drama\"]', 'privat', 1, '2026-06-04 18:48:23', '2026-06-04 18:48:23'),
(29, 5, 'nguawor', NULL, NULL, 'awldkmkawdmkl', '[\"Romance\"]', 'privat', 1, '2026-06-04 20:00:36', '2026-06-04 20:00:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8GGmluRQIGK3Yaoog2q02hvvKVTGTVjXUGcJBamG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJDZ0R1NlkzRWdPVXZjc3N4UGZtUVg1SU95TFcwM0ZvVGlwblFXU2s4IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2xvZ2luIiwicm91dGUiOiJsb2dpbiJ9LCJ1cmwiOnsiaW50ZW5kZWQiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvcG9zdHMifX0=', 1780631627),
('G1chxuB6BrrKFwETzSu2P9a8SdeldhvMdvoloV0C', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ4ck45S1dYTUpKWjVPRHM0eVB0UTlFTXdwc1I3QnRJb3FMY1FJWkNJIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wb3N0c1wvMjciLCJyb3V0ZSI6InBvc3RzLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOltdLCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=', 1781241124);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','author') NOT NULL DEFAULT 'author',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`) VALUES
(1, 'user', 'user@gmail.com', 'author', NULL, '$2y$12$zS8K201UG6UocMCCybn4OO4qRi/3UZsGkMqDT9zvFmLAlluWVbklu', NULL, '2026-05-08 19:57:08', '2026-05-24 19:31:00', '1779676260.png'),
(2, 'user2', 'user2@gmail.com', 'author', NULL, '$2y$12$IBzKiay6MBd9sUU4KALpX.RWkI8ExHZPWSk4XcNBSibP7FVU5czGu', NULL, '2026-05-08 23:45:17', '2026-05-08 23:45:17', NULL),
(4, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$2eC5VVJUAyqEfpz8PImlceQn7x983fQdnvOPNgLvSnaPgHaucMKc6', NULL, '2026-05-24 06:01:21', '2026-05-24 06:01:21', NULL),
(5, 'Mbappe', 'mbappe@gmail.com', 'author', NULL, '$2y$12$h2h/gDAgpeUBaMg8gTMh8eohCNjnYQmZeMedMM9VDvAJKwrLYKlGG', NULL, '2026-06-04 07:03:34', '2026-06-04 07:03:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapters_post_id_foreign` (`post_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
