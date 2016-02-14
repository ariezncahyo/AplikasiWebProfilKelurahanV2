-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2014 at 10:44 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `indihiang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `tgl_lahir` date NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `jns_klm` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `tgl_lahir`, `alamat`, `jns_klm`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@yahoo.com', '123456', 'admin', '1986-03-04', 'Admin', 'laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tema_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_agenda` text COLLATE latin1_general_ci NOT NULL,
  `tempat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pengirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `tema`, `tema_seo`, `isi_agenda`, `tempat`, `pengirim`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `username`) VALUES
(4, 'Pelatihan Cara Beternak Jangkrik', 'pelatihan-cara-beternak-jangkrik', 'Pelatihan cara-cara beternak jangkrik<br>', 'Alun-alun Indihiang', 'Ucup', '2014-01-16', '2014-01-18', '2014-01-16', 'admin'),
(5, 'Pelatihan Menjalankan Pabrik Tahu', 'pelatihan-menjalankan-pabrik-tahu', 'Pelatihan untuk menjalankan pabrik tahu biar sukses<br>', 'Alun-alun Indihiang', 'Ucup', '2014-01-20', '2014-01-23', '2014-01-16', 'admin'),
(6, 'Seminar Bisnis', 'seminar-bisnis', 'Seminar bisnis untuk para pebisnis pemula<br>', 'Alun-alun Indihiang', 'Ucup', '2014-01-26', '2014-01-27', '2014-01-16', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(2, 'Kota Tasikmalaya', 'http:///', 'kotatasik2.jpg', '2014-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_berita` longtext COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `username`, `judul`, `judul_seo`, `isi_berita`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`) VALUES
(16, 'admin', 'Peluang Bisnis Budidaya Ternak Jangkrik', '', 'Sebenarnya, jika kita termasuk orang yang rajin, teliti, dan ulet, banyak sekali peluang-peluang usaha yang bisa kita jalankan. Dari mulai pembudidayaan hewan kecil seperti undur-undur, sampai ke hewan yang agak besar seperti jangkrik. Ya, jangkrik. Berbicara tentang jangkrik, sepertinya setiap hari selalu saja banyak yang mencarinya. Umumnya jangkrik dicari orang untuk pakan burung. Karena ada yang mengatakan, Burung jika diberi makan jangkrik itu akan menambah kualitas dari suara kicauannya.<br><br>Nah, memanfaatkan peluang ini, maka budidaya jangkrik bisa menjadi peluang bisnis yang menjanjikan. Bayangkan saja, berapa banyak orang-orang pencinta burung yang tercatat. Pasti banyak bukan?<br><br>Apalagi jangkrik merupakan salah satu hewan yang sangat mudah sekali untuk di perkembangbiakan. Jika anda ingin menekuni bisnis di bidang ini berikut adalah tips berternak dan budidaya jangkrik untuk pemula. Sebenarnya dalam beternak jangkrik ada dua fase. Yang pertama adalah fase induk yaitu saat induk menelurkan telurnya dan fase yang kedua adalah fase telur menetas sampai jangkrik itu tumbuh menjadi dewasa.<br><br>Usaha budidaya jangkrik sendiri minim sekali kelemahan atau resikonya, karena keberhasilannya bisa 90%. Keberhasilan dalam penetasan dan pembesaran jangkrik juga sama-sama 90%, asalkan anda merawat jangkrik dengan sungguh-sungguh dan dalam pemberian pakan jangkrik tidak mengalami keterlambatan. Karena seperti yang singgung di atas, jangkrik itu bisa berubah menjadi kanibal jika tidak diberi makan.<br><br>Langkah awal dalam budidaya jangkrik, adalah memperhatikan beberapa persyaratan berikut ini:<br><br>1. Lokasi budidaya harus tenang, teduh dan mendapat sirkulasi udara yang baik.<br>2. Lokasi jauh dari sumber-sumber kebisingan seperti pasar, jalan raya dan lain sebagainya.<br>3. Tidak terkena sinar matahari secara langsung atau berlebihan.<br>4. Bebas dari gangguan predator tentunya.<br>5. Jauh dari kandang ayam.<br><br>', 'Kamis', '2014-01-16', '10:18:07', '47jangkrik2.JPG', 3),
(17, 'admin', 'Peluang Budidaya Jangkrik Masih Lebar', '', 'Sejak beberapa tahun lalu, jangkrik telah menjadi salah satu komoditas peternakan yang banyak dilirik masyarakat. Tingginya permintaan terhadap jangkrik sebagai pakan burung kicauan dan ikan, memicu masyarakat untuk mengembangkan bisnis budidaya jangkrik. Alhasil, budidaya jangkrik merajalela di mana-mana dan menjadi ladang subur untuk meraup rupiah.<br><br>Seiring dengan itu, beberapa koperasi jangkrik sebagai wadah para peternak pun mulai bermunculan. Namun, permasalahan kerap muncul terutama karena fluktuasi harga bersinergi dengan perilaku pasar yang cenderung tidak berpihak pada peternak, di mana jika pasokan bahan baku sedikit, sedangkan kebutuhan masyarakat besar, harganya melambung tinggi. Sebaliknya, bila pasokan bahan baku banyak (booming produksi) harganya turun drastis, bahkan tidak ada harganya. Hal inilah yang biasanya membuat peternak menjadi geram lantaran alokasi hasil panen masih sebatas untuk pakan burung kicauan dan ikan.<br><br>Baru pada dekade awal tahun 2000-an, bisnis budidaya jangkrik mulai kembali menunjukkan titik terang. Hasil panennya tidak lagi sekadar sebagai pakan burung dan ikan, melainkan bisa diolah menjadi bahan baku industri makanan, farmasi dan kosmetik. Ya, berdasarkan penelitian yang dilakukan para pakar terhadap komposisi kimia pada jangkrik, ditemukan bahwa di dalam tubuh jangkrik terkandung berbagai senyawa bernilai gizi tinggi dan bernilai farmakologi yang cukup baik.<br><br>Selain itu, para peternak pun tak perlu lagi khawatir hasil panennya tidak tertangani dengan baik. Sebuah wadah organisasi berskala nasional bagi peternak jangkrik di bawah bendera Forum Komunikasi Peternak Agromitra Swadaya Jangkrik Indonesia (FKP Askrindo), yang salah satu cabangnya beralamat di Desa Karang RT 04 RW II, timur Sub Terminal Delanggu, Klaten, siap membantu peternak mulai dari pengadaan sarana budidaya hingga pembelian hasil panen.<br>', 'Kamis', '2014-01-16', '10:20:32', '20jangkrik3.jpg', 2),
(18, 'admin', 'Mencoba Usaha Peternakan Jangkrik', '', 'Jangkrik atau cengkerik adalah jenis serangga yang pastinya sudah tak asing lagi bagi anda. Setiap malam, suaranya selalu hadir menemani orang-orang yang larut dalam mimpi. Dalam ilmu taksonomi, jangkrik termasuk keluarga Gryllidae yang memakan segalanya (omnivora). Sejak dulu dalam masyarakat Asia, jangkrik sering dipelihara untuk berbagai alasan, seperti sebagai binatang aduan, untuk pakan burung, hingga dimanfaatkan sebagai bahan kuliner. Namun kini, dengan berbagai penelitian, serangga jangkrik juga digunakan untuk bahan industri seperti kosmetik dan obat-obatan.<br><br>Menurut uji klinis dan penelitian yang dilakukan oleh Asosiasi Peternak Jangkrik Indonesia (ASTRIK 2002), jangkrik mengandung berbagai zat yang berguna untuk tubuh manusia. Ada senyawa sistein yang bermanfaat dalam membantu pembentukan zat antioksidan alami, ada juga asam amino, asam lemak dan protein yang dapat digunakan sebagai bahan farmasi, jamu, makanan, dan pakan ternak.<br><br>Semakin besarnya permintaan jangkrik dari berbagai pihak di beberapa daerah di Indonesia, menjadikan budidaya peternakan jangkrik cukup potensial mendatangkan penghasilan. Bagaimanakah caranya memulai sebuah usaha ternak jangkrik? Inilah sekilas gambarannya!<br><br>1. Persiapan Kandang dan Sarana Pendukung<br>Secara umum, bahan kandang yang dipakai dalam ternak jangkrik adalah kardus. Pada bagian samping dan atas kardus dilobangi kecil-kecil sebagai ventilasi udara dan pencahayaan. Buat juga sepotong jendela kecil tempat memasukkan pakan jangkrik. Ukuran kardus yang standar dalam budidaya jangkrik adalah 100cm x 60cm x 30cm. Untuk membuatnya menjadi lebih awet, kuat, dan menghindari binatang-binatang pengganggu, maka kandang kardus sebaiknya disimpan dalam rak-rak kawat. Sarana pendukung lainnya yang juga diperlukan antara lain rumpon untuk media persembunyian yang terbuat dari daun-daun/kertas kering, dan sarana tempat minum berupa spon atau wadah kecil yang lebar.<br><br>2. Kegiatan Penetasan (Pengembangbiakan)<br>Setelah kandang selesai dibuat, maka selanjutnya adalah memasukkan induk-induk jangkrik. Jangkrik betina ukurannya lebih kecil dari jangkrik jantan. Lakukan pemeliharaan dengan pemberian pakan dan minum yang teratur. Setelah terjadi perkawinan, maka beberapa hari kemudian induk betina akan menetaskan telur. Untuk membantu menetaskan telur, para peternak memakai berbagai metode, antara lain metode alami, metode buatan dengan kain halus, media pasir, stoples, atau dengan bantuan spons. Pada metode alami, tempat bertelur jangkrik dari kandang penangkaran langsung dipindahkan ke dalam kandang penetasan. Sementara pada metode dengan pasir, telur dipindahkan (ditaburkan) ke dalam bak pasir yang tebal pasirnya sekitar 3 cm, kemudian setelah pemindahan telur tersebut, telur ditaburi dengan pasir tipis sebagai penghangat suhu.<br><br>3. Pembesaran Ternak Jangkrik<br>Kegiatan pembesaran jangkrik merupakan upaya pemeliharaan agar pertumbuhan jangkrik bisa optimal, sehingga jika ditimbang atau dijual per kilonya menjadi lebih banyak. Dalam tahap ini, pemberian pakan menjadi kuncinya. Pada umur 1-2 minggu, anak jangkrik diberikan pakan berupa sayur-sayuran muda, dan selanjutnya adalah pakan berupa tepung dari jagung, palawija, dsb. Hal lain yang wajib diperhatikan adalah kontrol suhu. Suhu yang baik untuk jangkrik adalah 30°-37°C. Bila kondisi udara lebih dingin, maka dibantu dengan lampu 5 watt di sekitar kandang.<br><br>4. Kegiatan Panen dan Pemasaran<br>Jangkrik biasanya dipanen pada saat berumur 1 sampai 1,5 bulan. Kegiatan panen jangkrik dilakukan dengan cara menangkap dengan tangan atau memakai serok dan jaring. Jangkrik dipasarkan ke peternak-peternak unggas (burung) dengan harga sekitar 30-60ribu rupiah per kilogram. Selain itu, jangkrik dapat diolah menjadi tepung untuk dijual ke produsen jamu dan kosmetik, atau berkreatifitas seperti sekelompok masyarakat di Kamboja yang mengolahnya menjadi makanan ringan (snack) yang lezat.<br>', 'Kamis', '2014-01-16', '10:22:16', '43jangkrik4.jpg', 4),
(19, 'admin', 'Wali Kota Tasikmalaya Pantau Proyek Jalan Mangin', '', 'TASIKMALAYA, (PRLM).- Wali Kota Tasikmalaya, Budi Budiman dan Wakil Wali Kota Dede Sudrajat memantau proyek Mangin (jalan yang menghubungkan Kecamatan Mangunbumi-Indihiang), Senin (2/12/2013). Proyek itu terus dipantau karena harus selesai pada tahun ini.<br><br>"Pengerjaannya sudah 75 persen. Kami optimistis bisa selesai sesuai target," kata Budi Budiman seusai memantau. Dia mengatakan pembangunan jalan tersebut mengandalkan pengerjaan konstruksi dengan teknologi baru. Untuk itu, pemborong meyakinkan bisa menyelesaikan khususnya jembatan dengan segera.<br><br>Selain jalan yang pada tahap pertama ini panjangnya 3,5 km, Kemarin Budi juga meninjau tiga jembatan. Pada beberapa minggu lalu, peninjauan telah dilakukan oleh Wakil Wali Kota Dede Sudrajat.<br>', 'Kamis', '2014-01-16', '10:24:41', '4walkot.jpg', 7),
(20, 'admin', 'Kejaksaan Periksa Mantan Walikota Tasikmalaya', '', 'Tasikmalaya - Mantan Wali kota Tasikmalaya, Syarif Hidayat, diperiksa penyidik Kejaksaan Negeri Kota Tasikmalaya, Kamis 12 September 2013. Dia diperiksa sebagai saksi terkait kasus pemotongan penyaluran dana CSR Bank Jabar Banten (BJB) dengan tersangka Irfan. Irfan sendiri merupakan ajudan Syarif saat masih menjabat walikota.<br><br>"Diperiksa sebagai saksi dari saudara Irfan," kata Syarif usai menjalani pemeriksaan di Kantor Kejari Tasikmalaya, Kamis.<br><br>Menurut dia, pertanyaan penyidik diantaranya mengenai beberapa hal terkait proposal dan penyaluran dana CSR BJB. Inti dari pertanyaan penyidik,&nbsp; adalah apakah dirinya memerintah tersangka untuk memotong dana CSR atau tidak.<br><br>"Saya ditanya pernah merintah nggak kepada Irfan untuk mengambil uang? Saya bilang tidak pernah merintah. Irfan juga bilang tidak diperintah. Itu saja," jelas Syarif.<br><br>Penyaluran CSR&nbsp; terjadi&nbsp; tiga kali sekitar tahun 2008 sampai 2010. Awalnya BJB mengumumkan ada dana CSR. Dana pertama&nbsp; Rp 250 juta, kedua Rp 442 juta, dan ketiga Rp 700 juta. "Yang pertama tidak ada masalah, ketiga tidak ada masalah. Yang kedua ini yang 442 ada masalah," kata Syarif.<br><br>Dana itu, menurut dia, disalurkan untuk membantu usaha kecil, mikro, kelompok tani, dan untuk bantuan perbaikan atau renovasi bangunan. "Sekarang kan sudah tidak boleh. Kata BJB, sekarang hanya untuk membantu empowering (penguatan) ekonomi," ucap Syarif.<br><br>Terkait pemotongan dana CSR BJB oleh Irfan, Syarif mengaku tidak mengetahuinya.&nbsp; "Saya hanya ditanya (penyidik) menyuruh (Irfan) atau tidak. Saya jawab tidak," kata dia.<br><br>Kepala Seksi Pidana Khusus Kejari Kota Tasikmalaya, Ubaydilah menjelaskan, penyidik menyampaikan 14 pertanyaan kepada Syarif. Inti pertanyaan yakni ada atau tidaknya perintah untuk memotong dana bantuan.<br><br>Di berita acara pidana (BAP), Irfan mengaku diperintah Syarif untuk memotong uang. Namun ketika penyidik mengkonfirmasikan hal itu kepada Syarif, dia membantahnya. "Tapi nanti kami akan konfirmasi juga kebenarannya itu. Akan pertemukan dan konfrontir keterangan Irfan dan Syarif," kata&nbsp; Ubaydilah.<br><br>Menurut dia, dana CSR disalurkan untuk kelompok usaha kecil maupun kelompok tani. Pada kenyataannya, sekitar 200-an anggota kelompok tani mengaku dana tersebut telah dipotong.&nbsp; Dana para poktan yang dipotong bervariasi. Berdasarkan keterangan saksi, saat penyerahan ada kwitansi melalui Irfan. Umpanyanya di kwitansi tertulis Rp 5 juta ternyata hanya dikasih Rp 1 juta.<br><br>Hingga saat ini, masih ada 60 penerima dana CSR yang belum dimintai keterangan atau di-BAP. Bantuan kepada 60 kelompok itu juga dipotong oleh tersangka. "Nanti kita BAP. Total jumlah potongan, kami masih kumpulkan data dari poktan. Setelah terkumpul, nanti kita bawa ke BPKP untuk menjumlah total kerugiannya berapa. Sementara masih pemeriksaan saksi-saksi dulu, termasuk mantan walikota," jelas dia.<br><br>Kejari Kota Tasikmalaya telah menetapkan tiga tersangka dalam kasus pemotongan dana CSR ini. Ketiga tersangka yakni Irfan, Mj dan seorang rekan Irfan. Hingga kini para tersangka belum ditahan.&nbsp; "Karena masih tahap penyidikan, belum mengambil tindakan hukum, jadi belum ditahan," katanya.<br><br>', 'Kamis', '2014-01-16', '10:27:00', '3walkot2.jpg', 3),
(21, 'admin', 'Usaha Pembuatan Tahu dan Tempe', '', 'Siapa yang tak kenal dengan bahan makanan Tahu dan Tempe. Kedua pengganti daging tersebut sudah sangat erat dengan kehidupan masyarakat Indonesia. Bukan hanya kelas bawah, tahu dan tempe juga sering menjadi pilihan menu bagi masyarakat ekonomi kelas mapan. Bagi masyarakat Indonesia, kurang lengkap rasanya, jika dalam sebulan tidak mencicipi menu lauk yang berbahan kacang kedelai tersebut. <br><br>Menggeluti usaha pembuatan tempa atau tahu di Indoneisa memang tak pernah mati. Walaupun untung yang diperoleh tidak besar, tapi bisa dikatakan usaha ini sangat stabil, meskipun ekonomi global sedang kacau, asalkan bahan baku tetap tersedia. Usaha produksi tempa dan tahu di Indonesia masih menggunakan alat-alat konvensional yang tradisional, meskipun beberapa produsen telah mulai meningkatkan beberapa alat yang lebih modern.<br><br>Proses Pembuatan Tahu<br>Alat-alat : timbangan, alat menjemur, bak perendam, pengiling kedelai, bak penampung, alat perebus, bak penggumpalan protein, bak penyimpanan cairan bekas, kain saring, cetakan tahu, alat pres (mengeluarkan air dari bubur tahu), alat pemanas (kompor), alat penghalus (blender), dan wajan untuk mengaduk, serta mesin pengupas kedelai.<br>Cara membuat tahu : memilih kedelai yang bagus; mencuci dan merendam kedelai sekitar 6 jam; mengupas dan memecah kedelai dengan mesin pengupas; menggiling kedelai hingga halus dan berair; mengalirkan air susu kedelai ke dalam bak penampungan; merebus susu kedelai hingga mendidih dan menjadi bubur; bubur dipindahkan ke bak penggumpalan protein; melakukan penyaringan terhadap bubur kedelai dengan menggunakan kain kasar untuk mendapatkan sari-sari kedelai; limbah hasil penyaringan dialirkan ke bak penampungan; air sari kedelai digumpalkan dengan&nbsp; menggunakan asam cuka; setelah menggumpal tahu dipres-dicetak; dan tahu siap dipasarkan.<br><br>Proses Pembuatan Tempe<br>Alat-alat : wadah (baskom), saringan, dandang, kipas angin, sendok kayu, tampah, kompor, dan beberapa alat tambahan lainnya.<br>Cara membuat tempe : memilih kedelai yang bagus; mencuci lalu merendam kedelai dengan air biasa sekitar 12 – 18 jam; mengupas kulit kedelai yang sudah lunak; merebus biji kedelai hingga empuk; mendinginkan biji kedelai yang telah direbus dengan kipas angin; mencampur dengan ragi tempe Rhizopus sp (1-2 gr ragi untuk 2 kg kedelai); memasukkan adonan kedelai ke dalam plastik cetakan (diberi lubang kecil untuk sirkulasi jamur); menyimpannya selama 1-2 hari hingga jamur telah tumbuh di semua bijih kedelai; tempe siap dipasarkan.<br><br>Demikian sekilas tentang UKM pembuatan tempe dan tahu. Resiko dari usaha ini adalah keterbatasan bahan baku, karena selama ini jumlah produksi kedelai dari petani dalam negeri tidak mencukupi permintaan. Selain itu hasil produksi ini tidak bisa bertahan lama (2-3 hari), sehingga jika tidak laku mereka menjualnya untuk bahan pakan ternak atau mengolahnya kembali menjadi keripik.<br>', 'Kamis', '2014-01-16', '10:38:16', '30tahu2.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id_download` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul`, `nama_file`, `tgl_posting`) VALUES
(4, 'Logo Kota Tasikmalaya', 'kotatasik.jpg', '2014-01-16'),
(5, 'Biaya Produksi Tahu', 'biaya-produksi-tahu.docx', '2014-01-16'),
(6, 'Profil Kelurahan Indihiang', 'indihiangkel.zip.doc', '2014-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE IF NOT EXISTS `hubungi` (
  `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(3, 'ucup2', 'ucup@yahoo.com', 'ucup', 'maju terus kelurahan indihiang', '2014-02-25'),
(2, 'ucup', 'ucup@yahoo.com', 'ucup', 'semoga kelurahan indihiang semakin maju', '2014-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_berita` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_berita`, `nama_komentar`, `url`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`) VALUES
(2, 12, 'tes', 'tes.com', 'tes', '2014-01-16', '09:36:17', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(18, 'Berita', '?module=berita', '', '', 'Y', 'admin', 'Y', 1, 'semua-berita.html'),
(19, 'Banner', '?module=banner', '', '', 'N', 'admin', 'Y', 9, ''),
(49, 'Admin', '?module=profilku', 'Profil Admin', '', 'N', 'admin', 'Y', 4, ''),
(35, 'Komentar', '?module=komentar', '', '', 'N', 'admin', 'Y', 7, ''),
(36, 'Download', '?module=download', '', '', 'Y', 'admin', 'Y', 8, 'semua-download.html'),
(40, 'Pesan', '?module=hubungi', '', '', 'Y', 'admin', 'Y', 10, 'hubungi-kami.html'),
(41, 'Agenda', ' ?module=agenda', '', '', 'Y', 'admin', 'Y', 2, 'semua-agenda.html'),
(46, 'Halaman Depan', '../index.php', '', '', 'N', 'user', 'Y', 14, ''),
(50, 'Profil', '?module=profil', 'Kelurahan Indihiang terbentuk pada tanggal 21 Oktober 2001 Undang-undang No 24 tahun 2001. Sebagai salah satu Organisasi Perangkat Daerah yang dibentuk berdasarkan kewajiban pemerintah daerah dalam memenuhi hak-hak warga masyarakat Kota Tasikmalaya.<br>', 'kotatasik.jpg', 'Y', 'admin', 'Y', 1, 'profil-kami.html'),
(51, 'Potensi Daerah', '?module=potensi', '', '', 'Y', 'admin', 'Y', 1, 'semua-potensi.html');

-- --------------------------------------------------------

--
-- Table structure for table `potensi`
--

CREATE TABLE IF NOT EXISTS `potensi` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_potensi` longtext COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `potensi`
--

INSERT INTO `potensi` (`id`, `username`, `judul`, `judul_seo`, `isi_potensi`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`) VALUES
(1, 'admin', 'Ternak Jangkrik', '', 'Budidaya burung saat ini memang sedang marak, maka permintaan jangkrik sebagai salah satu makanan burung juga meningkat. Dengan itu maka prospek budidaya jangkrik semakin cerah dengan tingginya permintaan akan permintaan jangkrik di pasaran, karena banyak daerah yang kekurangan akan pasokan jangkrik sebagai pakan ternak burung. Disini saya akan memberikan sedikit tentang cara ternak jangkrik, semoga bermanfaat.<br><br>Pembuatan Kandang Jangkrik<br>Tahap awal dalam budidaya jangkrik adalah persiapan kandang. Kandang yang baik adalah kandang yang :<br>1. Jangkrik terhindar dari pemangsa<br>2. Mudah untuk mengontrol keadaan dan pertumbuhan jangkrik setiap waktu.<br>3. Menjadikan Kandang yang nyaman untuk jangkrik,<br>4. Pastikan sirkulasi udaranya bagus,<br>5. Memudahkan pada saat pemanenan.<br>6. Jangan terkena sinar matahari langsung.<br><br>Sekarang kita memasuki Pembuatan, bahan dan bentuk kandang jangkrik yang saya buat sekarang :<br><br>Bahan-Bahan Pembuatan kandang Jangkrik :<br>1. Triplek<br>2. Paku Kecil<br>3. Kayu Kaso Kecil / kayu reng<br>4. Lem Kayu<br>5. Lakban Coklat yang besar ( ukuran 44 mm )<br>6. jangan lupa sediakan gunting, gergaji dll<br><br>Proses pembuatan Kandang jangkrik:<br>* Bentuk menjadi persegi panjang dengan ukuran : Panjang = 50 Cm, Lebar = 60 Cm, Tinggi = 120 Cm<br>* Beri Lem kayu pada setiap sudut untuk menutupi celah, perlu diketahui pada saat menetas jangkrik berukuran sangat kecil.<br>* Beri pinggiran atas bagian dalam dengan Lakban Coklat ... fungsinya agar jangkrik tidak bisa merayap terus ke atas.<br>* Jangan Lupa untuk Kandang Kaki dari kandang jangkrik beri jarang Min 20 Cm dan beri mangkuk yang diisi air dan garam, untuk menghindari semut, alternatif lain silahkan beri Lem tikus.<br><br>Persyaratan lokasi ternak jangkrik<br><br>Lokasi peternakan sebaiknya :<br>1. Usahakan lokasi budidaya harus tenang, teduh dan mendapat sirkulasi udara yang baik.<br>2. Lokasi jauh dari sumber-sumber kebisingan seperti pasar, jalan raya dan lain sebagainya.<br>3. Tidak terkena sinar matahari secara langsung atau berlebihan<br>4. Hindari Hama pemangsa jangkrik seperti : semut, cecak, laba-laba, ayam, kucing, kadal dll.<br>5. Usahakan Lokasi mudah untuk dimonitor setiap hari perkandangnya<br>', 'Kamis', '2014-01-16', '10:03:54', '77jangkrik1.jpg', 6),
(2, 'admin', 'Usaha Pabrik Tahu', '', 'Tahu, sudah menjadi makanan tradisional nusantara. Walaupun ada yang mengatakan bahwa tahu berasal dari Cina yang dikenal dengan nama Tofu, namun masyarakat Indonesia sudah menganggapnya sebagai masakan tradisional yang bergizi, murah dan lezat. Tahu, merupakan makanan sederhana yang nikmat serta kaya gizi. Teksturnya yang kenyal halus dan rasanya yang gurih. Walau begitu, membuat tahu harus melalui beberapa tahapan yang tidak sederhana. Usaha kecil membuat tahu tempe masih bertahan dan terus mengalami pembaruan terutama di bidang peralatan dan cara membuat yang lebih sehat.<br>', 'Kamis', '2014-01-16', '10:36:26', '66tahu.jpg', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
