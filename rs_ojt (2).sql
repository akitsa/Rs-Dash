-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 01:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_ojt`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_07_030746_create_tb_kat_news', 1),
(6, '2023_05_07_030903_create_tb_news', 1),
(7, '2023_05_07_032654_create_tb_galery_img', 1),
(8, '2023_05_15_114553_create_tb_galery_vid', 1),
(9, '2023_05_17_060251_create_tb_profile', 1),
(10, '2023_06_09_013759_create_tb_pages_table', 1),
(11, '2023_06_13_153736_add_foto_desc_column_kategori', 1),
(12, '2023_06_18_110426_create_tb_layanan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_galery_img`
--

CREATE TABLE `tb_galery_img` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `desc` varchar(50) NOT NULL,
  `status` enum('A','Na') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_galery_vid`
--

CREATE TABLE `tb_galery_vid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `desc` varchar(255) NOT NULL,
  `status` enum('A','NA') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kat_news`
--

CREATE TABLE `tb_kat_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_kat` varchar(255) NOT NULL,
  `status_kat` enum('A','Na') NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kat_news`
--

INSERT INTO `tb_kat_news` (`id`, `nm_kat`, `status_kat`, `foto`, `desc`) VALUES
(1, 'Info Kesehatan', 'A', NULL, 'Info Kesehatan'),
(2, 'Info Kesehatan Umum', 'A', NULL, 'Info Kesehatan Umum'),
(3, 'Info Penyakit', 'A', NULL, 'Info Penyakit'),
(4, 'Info Umum', 'A', NULL, 'Info Umum'),
(5, 'Tips', 'A', NULL, 'tips kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_layanan`
--

CREATE TABLE `tb_layanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `konten` varchar(255) NOT NULL,
  `status` enum('A','Na') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kat_news` varchar(5) NOT NULL DEFAULT '1',
  `title` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `konten` longtext DEFAULT NULL,
  `status` enum('A','Na') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`id`, `id_kat_news`, `title`, `slug`, `foto`, `konten`, `status`, `created_at`, `updated_at`) VALUES
(1, '3', 'Penyakit Virus Ebola (PVE/EVD)', 'penyakit-virus-ebola-pve-evd', 'http://localhost:8000/back/uploads/news/1687176150.jpg', '<p>Penyakit virus ebola (PVE) adalah penyakit yang disebabkan oleh virus Ebola, yang termasuk dalam famili filovirus. Penyakit ini dikenal dengan&nbsp;<em>Ebola Virus Disease</em>&nbsp;(EVD) atau&nbsp;<em>Ebola Haemorrhagic Fever</em>&nbsp;(EHF).&nbsp; Terdapat enam macam genus virus ebola penyebab penyakit ini, yaitu&nbsp;<em>Zaire ebolavirus</em>,&nbsp;<em>Bundibugyo ebolavirus</em>&nbsp;(BDBV),&nbsp;<em>Reston ebolavirus, Sudan ebolavirus</em>&nbsp;(SUDV),&nbsp;<em>Tai Forest ebolavirus</em>&nbsp;(TAFV) yang dulu dikenal dengan&nbsp;<em>Ivory Coast ebolavirus</em>&nbsp;(CIEBOV), dan&nbsp;<em>Bombali ebolavirus</em>. Namun hingga saat ini, baru dilaporkan empat genus virus yang mengakibatkan PVE pada manusia yakni&nbsp;<em>Zaire ebolavirus</em>,&nbsp;<em>Sudan ebolavirus, Tai Forest ebolavirus</em>, dan&nbsp;<em>Bundibugyo ebolavirus</em>.&nbsp;</p>\r\n\r\n<p>Virus ebola pertama kali diidentifikasi pada tahun 1976 di dua tempat secara bersamaan yakni di Yambuku (sebuah desa yang terletak tidak jauh dari Sungai Ebola, Republik Demokratik Kongo) dan Nzara, Sudan Selatan. Wabah di Afrika bagian Barat (kasus pertama pada Maret 2014) adalah yang terbesar dan paling kompleks sejak virus ebola pertama kali ditemukan pada tahun 1976. Negara yang terkena dampak paling parah yakni, Guinea, Liberia dan Sierra Leone. Sejak tahun 2014 hingga saat ini, kasus PVE telah dilaporkan pada berbagai negara baik di Afrika, Amerika, dan Eropa, yakni Sierra Leone, Liberia, Republik Demokratik Kongo, Guinea, Uganda, Nigeria, Mali, Amerika Serikat, Italia, Senegal, Spanyol, Inggris, dan Pantai Gading. Selain itu, telah ditemukan beberapa kasus kluster yang sumber penularannya dari survivor Ebola baik di Liberia, Guinea, dan Sierra Leone. Penularan tersebut diketahui karena adanya kontak dengan cairan tubuh survivor. Badan Kesehatan Dunia (WHO) pernah menyatakan PVE sebagai Public Health Emergency of International Concern (PHEIC) atau Kedaruratan Kesehatan Masyarakat yang Meresahkan Dunia (KKMMD) akibat timbulnya wabah PVE di Republik Demokratik Kongo pada 17 Juni 2019 namun telah dideklarasikan berakhir pada 26 Juni 2020.&nbsp;</p>\r\n\r\n<h3>Situasi di Indonesia</h3>\r\n\r\n<p>Sampai saat ini belum pernah dilaporkan kasus konfirmasi penyakit virus ebola di Indonesia.</p>\r\n\r\n<h3>Situasi Global</h3>\r\n\r\n<p>Sejak tahun 2014 hingga saat ini, telah dilaporkan sebanyak 32.486 kasus PVE dengan 13.812 kematian (CFR: 42,52%). Lima negara dengan pelaporan tertinggi kasus PVE adalah Sierra Leone (14.124 kasus), Liberia (10.678 kasus), Guinea (3.837 kasus), Republik Demokratik Kongo (3.758 kasus), dan Uganda (52 kasus).</p>\r\n\r\n<p>Wabah penyakit virus Ebola saat ini sedang terjadi di negara Uganda, Afrika melalui deklarasi resmi yang dikeluarkan oleh otoritas kesehatan Uganda pada 20 September 2022. Wabah ini disebabkan oleh Sudan ebolavirus (SUDV), dimana wabah akibat tipe virus ini terjadi terakhir di Uganda pada tahun 2012.&nbsp; Terhitung hingga 28 September 2022, telah dilaporkan sebanyak 49 kasus PVE (31 kasus konfirmasi dan 18 kasus probable) dengan 24 kematian (6 kasus konfirmasi dan 18 kasus probable) [CFR di antara kasus konfirmasi: 19,4%]. Kasus tersebut dilaporkan pada tiga distrik di Uganda, yakni Mubende, Kyegegwa, dan Kassanda. 223 kontak sudah ditemukan hingga 25 September 2022.&nbsp; (Sumber: Disease Outbreak News WHO: Ebola Disease caused by Sudan virus - Uganda, tanggal 26 September 2022 dan WHO Africa Region&#39;s News: Uganda Defines Priorities and Needs in Its Ebola Response Plan, tanggal 1 Oktober 2022).</p>\r\n\r\n<p>WHO menilai risiko penyebaran PVE di Uganda saat ini tergolong tinggi pada tingkat nasional dan tergolong rendah pada tingkat regional dan global. Hal tersebut dilandaskan dengan pertimbangan sebagai berikut:</p>\r\n\r\n<ul>\r\n	<li>Belum adanya vaksin yang teruji efektif terhadap tipe virus/strain Sudan Ebola Virus</li>\r\n	<li>Belum teridentifikasi awal mula terjadinya penularan karena proses investigasi masih berjalan</li>\r\n	<li>Penggunaan APD yang tidak sesuai dalam penanganan pasien-pasien suspek PVE serta kasus terkonfirmasi PVE yang meninggal dimakamkan secara tradisional serta melibatkan orang dalam jumlah besar</li>\r\n	<li>Walaupun Uganda telah meningkatkan kapasitas dalam pengendalian PVE, masih terdapat kemungkinan timbul permasalahan apabila kasus meningkat secara drastis dan masih terjadinya beberapa kejadian penyakit lain seperti COVID-19, anthrax, demam kuning, dan demam Rift Valley.</li>\r\n</ul>\r\n\r\n<p>Selain itu, walaupun Distrik Mubende tidak memiliki perbatasan internasional, risiko penularan antar negara masih dapat terjadi karena intensitas aktivitas pelintas negara yang tinggi. Kasus pun ditemukan pada sekitar pertambangan emas yang masih aktif, sehingga memungkinkan para pedagang komoditas di sekitar area itu melakukan mobilisasi ke wilayah lain meski sudah memasuki masa inkubasi.</p>\r\n\r\n<h3>Gejala, tanda dan masa inkubasi</h3>\r\n\r\n<p>Gejala penyakit virus ebola ini didahului oleh demam yang tiba-tiba, sakit kepala, nyeri sendi dan otot, lemah, diare, muntah, sakit perut, kurang nafsu makan, dan perdarahan yang tidak biasa. Dalam beberapa kasus, pendarahan dalam dan luar dapat terjadi 5 sampai 7 hari setelah gejala pertama terjadi. Semua penderita yang terinfeksi PVE menderita kesulitan pembekuan darah. Pendarahan dari selaput mulut, hidung dan tenggorokan serta dari bekas lubang suntikan terjadi pada 40-50 persen kasus. Hal ini menyebabkan muntah darah, batuk darah dan berak darah. Masa inkubasi penyakit ini antara 2 &ndash; 21 hari.</p>\r\n\r\n<h3>Cara transmisi (Penularan)</h3>\r\n\r\n<p>Virus Ebola ini menular melalui darah dan cairan tubuh lainnya (termasuk urin, saliva/air liur, keringat, feses/tinja, bekas muntahan, ASI, dan cairan semen/sperma) dari hewan atau manusia yang terinfeksi Ebola. Virus ini dapat masuk ke tubuh orang lain melalui kulit yang terluka atau melalui membrane mukosa yang tidak terlindungi seperti mata, hidung dan mulut. Virus ini juga dapat menyebar melalui alat-alat seperti pakaian, tempat tidur dan perlengkapannya, jarum suntik, infus, serta alat medis yang telah terkontaminasi dengan darah atau cairan tubuh dari seseorang yang terinfeksi Ebola. Kelompok yang paling berisiko adalah keluarga, teman, rekan kerja dan petugas medis yang merawat pasien yang terkena virus Ebola. Di rumah sakit, virus ini juga bisa tersebar dengan cepat.</p>\r\n\r\n<p>Selain itu, penularan juga bisa terjadi jika pelayat menyentuh jenazah sosok yang meninggal karena Ebola. Binatang juga bisa menjadi pembawa virus. Virus ini mampu memperbanyak diri di hampir semua&nbsp;<em>sel inang</em><em>.&nbsp;</em>Khususnya kelelawar mampu menularkan virus tersebut. Codot dan kalong termasuk jenis kelelawar besar. Di Afrika, sebagian besar jenis hewan ini membawa virus di dalam tubuhnya, termasuk di antaranya virus Ebola. Tidak seperti manusia, kelelawar kebal terhadap virus-virus tersebut. Karena sering dijadikan bahan makanan, virus yang terdapat pada daging kelelawar dapat dengan mudah menjangkiti manusia.</p>\r\n\r\n<h3>Penegakan diagnosis</h3>\r\n\r\n<p>Diagnosis penyakit virus ebola dapat dilakukan melalui pemeriksaan laboratorium meliputi&nbsp;<em>antibody-capture&nbsp;</em><em>enzyme-linked immunosorbent assay&nbsp;</em>(ELISA), tes deteksi&nbsp;<em>antigen-capture,</em>&nbsp;<em>serum neutralization</em>,&nbsp;<em>reverse-trancriptase polymerase chain reaction&nbsp;</em>(RT-PCR),&nbsp;<em>electron microcopy,</em>&nbsp;dan isolasi virus dengan kultur sel.</p>\r\n\r\n<h3>Treatment/penatalaksanaan</h3>\r\n\r\n<p>Seseorang yang terkonfirmasi PVE dapat dilakukan terapi suportif dan pengobatan terhadap gejala spesifik. Pengobatan untuk PVE telah dikembangkan dan diuji sewaktu kejadian wabah PVE di Republik Demokratik Kongo pada 2018-2020.<br />\r\n<br />\r\nDua monoklonal antibodi (Inmazeb dan Ebanga) telah disetujui oleh&nbsp;<em>US Food and Drug Administration</em>&nbsp;pada akhir 2020 sebagai pengobatan terhadap infeksi strain Zaire ebolavirus pada dewasa dan anak.&nbsp;</p>\r\n\r\n<h3>Faktor risiko</h3>\r\n\r\n<p>Beberapa faktor risiko yang memepengaruhi penularan penyakit virus ebola:</p>\r\n\r\n<ul>\r\n	<li>Riwayat perjalanan dari daerah / negara terjangkit</li>\r\n	<li>Kegiatan selama berada di daerah/ negara terjangkit</li>\r\n	<li>Ada tidaknya tanda dan gejala PVE.</li>\r\n	<li>Tidak diberikan vaksin saat berpergian ke daerah endemis.</li>\r\n	<li>Tidak menerapkan pencegahan dan pengendalian infeksi saat penangan kasus penyakit virus ebola bagi tenaga kesehatan.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Cara pencegahan</h3>\r\n\r\n<p>Mencegah atau membatasi penularan infeksi di sarana pelayanan kesehatan memerlukan penerapan prosedur dan protokol yang disebut sebagai &ldquo;kewaspadaan isolasi&rdquo;. Secara umum pencegahan dan pengendalian infeksi pada penyakit virus Ebola kewaspadaan standar dan kewaspadaan kontak. Pada tindakan tertentu yang menghasilkan butir-butir aerosol (Inhalasi/Nebulizer) dan tindakan invasif lainnya seperti melakukan intubasi,&nbsp;<em>suctioning</em>, swab tenggorok dan hidung perlu dilakukan penambahan kewaspadaan&nbsp;<em>airborne</em>.</p>\r\n\r\n<p>Melakukan kebersihan tangan (<em>hand hygiene</em>) sesuai prosedur. Ada&nbsp;<em>5-moment</em>s dimana harus dilakukan kebersihan tangan yaitu sebelum kontak pasien, setelah kontak pasien, sebelum melakukan tindakan medis, sesudah kontak dengan bahan infeksius dan setelah kontak dengan lingkungan pasien. Penggunaan APD sesuai dengan prosedur untuk memakai dan melepaskan secara benar.</p>\r\n\r\n<p>Berkaitan dengan vaksinasi, telah dikembangkan vaksinasi dengan nama &quot;<em>Ervebo vaccine&quot;</em>&nbsp;yang sudah teruji efektif dalam melindungi masyarakat terhadap strain Zaire ebolavirus.</p>\r\n\r\n<p>Pencegahan lainnya:</p>\r\n\r\n<ul>\r\n	<li>Menghindari kontak langsung dengan penderita maupun jenazah penderita penyakit virus ebola adalah cara yang tepat, karena penyakit ini dapat menular melalui darah dan cairan tubuh lainnya.</li>\r\n	<li>Menggunakan alat pelindung diri yang lengkap sesuai SOP dan mencuci tangan sesuai prosedur adalah cara terbaik dalam melindungi diri setelah kontak pasien, sebelum melakukan tindakan medis, sesudah kontak dengan bahan infeksius dan setelah kontak dengan lingkungan pasien.</li>\r\n	<li>Melakukan vaksinasi bila hendak bepergian ke daerah/negara terjangkit.</li>\r\n	<li>Sampel cairan dan jaringan tubuh dari penderita penyakit harus ditangani dengan sangat hati-hati dan sesuai dengan pencegahan dan pengendalian penyakit infeksi.</li>\r\n</ul>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<h3>Penilaian Risiko Penyebaran PVE di Indonesia</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Risiko impotasi penyakit virus ebola rendah bagi Indonesia. Hal ini dikarenakan meskipun mobilitas ke negara terjangkit tinggi, namun diketahui daerah yang saat ini dilaporkan adanya kasus ebola di negara terjangkit termasuk daerah terpencil dan sulit dijangkau.</p>\r\n	</li>\r\n	<li>\r\n	<p>Risiko Indonesia sebagai episenter pandemi rendah karena belum dilaporkan ditemukan virus ebola di Indonesia maupun negara sekitar Indonesia.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Sumber:<br />\r\n- WHO Fact Sheet about Ebola Virus Disease (<a href=\"https://www.who.int/news-room/fact-sheets/detail/ebola-virus-disease\">https://www.who.int/news-room/fact-sheets/detail/ebola-virus-disease</a>)</p>', 'A', '2023-06-19 05:02:30', '2023-06-19 05:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pages`
--

CREATE TABLE `tb_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `konten` varchar(255) NOT NULL,
  `status` enum('A','Na') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile`
--

CREATE TABLE `tb_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_perusahaan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','User') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$H1n1oqdBbIWd0C3jc6GFDeZRmNwmZASqNeB70gYU4U99boDOnYvPi', 'Admin', NULL, '2023-06-19 04:57:47', '2023-06-19 04:57:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_galery_img`
--
ALTER TABLE `tb_galery_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_galery_vid`
--
ALTER TABLE `tb_galery_vid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kat_news`
--
ALTER TABLE `tb_kat_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_layanan_slug_unique` (`slug`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_news_slug_unique` (`slug`),
  ADD KEY `tb_news_id_kat_news_index` (`id_kat_news`);

--
-- Indexes for table `tb_pages`
--
ALTER TABLE `tb_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_pages_slug_unique` (`slug`);

--
-- Indexes for table `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_galery_img`
--
ALTER TABLE `tb_galery_img`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_galery_vid`
--
ALTER TABLE `tb_galery_vid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kat_news`
--
ALTER TABLE `tb_kat_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pages`
--
ALTER TABLE `tb_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
