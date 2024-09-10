-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2022 pada 20.44
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ormawa_unis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('upt_it','baak','warek') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(14, 'UPT IT', 'upt_it@gmail.com', '$2y$10$EYYDGrliyt66wP4/8HrwW.NhMNXgPse1zrka2vB2EjYUP9l8QSWcW', 'upt_it', '2022-07-10 18:55:04', '2022-08-05 09:31:24'),
(15, 'BAAK', 'baak@gmail.com', '$2y$10$O03V8X3z8geEp1joR9SdregrIbgW8x0DT1CxHYJPN4PWP8r1WfWqq', 'baak', '2022-07-10 19:31:14', '2022-08-05 09:31:53'),
(16, 'WAREK', 'warek@gmail.com', '$2y$10$E4gC0jTDztSEWhWA1oGvYuPArWAfRf4fVwxm0e6F8rC.spUiT24fu', 'warek', '2022-07-10 19:31:58', '2022-08-05 09:32:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ormawa_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `ormawa_id`, `nama`, `nim`, `no_hp`, `email`, `alamat`, `jabatan`, `created_at`, `updated_at`) VALUES
(2, 1, 'Farras Aldi Alfikri', '1804030114', '089644128291', 'faras_aldi@yahoo.com', 'VTE', 'wakil', '2022-07-12 03:09:04', '2022-08-04 12:38:16'),
(3, 2, 'Reza Maulana', '1804030114', '089644128291', 'admin@faras.xyz', 'VTE', 'sekretaris', '2022-07-12 03:09:59', '2022-07-12 05:16:11'),
(4, 1, 'Adam setioardi', '1804030111', '089644128291', 'admin@faras.xyz', 'VTE', 'bendahara', '2022-07-12 03:53:57', '2022-07-12 03:53:57'),
(7, 6, 'Farras Aldi Alfikri', '1804030114', '089644128291', 'admin@faras.xyz', 'VTE', 'ketua', '2022-07-26 04:42:39', '2022-07-26 04:42:39'),
(8, 5, 'Adam setioardi', '1804030114', '089644128291', 'adam@gmail.com', 'Karawaci', 'anggota', '2022-08-10 23:23:33', '2022-08-10 23:23:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Kegiatan', 'kegiatan', '2022-07-08 14:54:40', '2022-07-16 09:39:34'),
(2, 'Berita', 'berita', '2022-07-08 14:54:40', '2022-07-16 09:39:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana`
--

CREATE TABLE `dana` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengajuan_id` bigint(20) UNSIGNED NOT NULL,
  `ormawa_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_dana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwal_pengambilan` date NOT NULL,
  `tanggal_pengambilan` date DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dana`
--

INSERT INTO `dana` (`id`, `pengajuan_id`, `ormawa_id`, `jumlah_dana`, `jadwal_pengambilan`, `tanggal_pengambilan`, `keterangan`, `bukti`, `status`, `created_at`, `updated_at`) VALUES
(9, 18, 1, '500000', '2022-08-21', '2022-08-21', 'Diambil oleh bendahara', 'http://127.0.0.1:8000/storage/photos/Bukti Pengambilan Dana/1830544536.jpg', '1', '2022-08-18 21:33:02', '2022-08-18 21:34:17'),
(10, 19, 1, '800000', '2022-08-19', '2022-08-19', 'Diambil oleh bendahara', 'http://127.0.0.1:8000/storage/photos/Bukti Pengambilan Dana/1830544536.jpg', '1', '2022-08-18 21:37:54', '2022-08-18 21:41:42'),
(16, 20, 6, '800000', '2022-08-19', NULL, NULL, NULL, '0', '2022-08-19 14:58:57', '2022-08-19 14:58:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_16_083541_create_posts_table', 1),
(6, '2022_01_16_153021_create_categories_table', 1),
(7, '2022_03_14_150016_create_media_table', 1),
(8, '2022_05_25_054622_create_admin_table', 1),
(9, '2022_07_11_025228_create_ormawa_table', 2),
(10, '2022_07_11_031533_create_anggota_table', 3),
(11, '2022_07_14_124718_create_pengajuan_table', 4),
(12, '2022_07_14_131545_create_persetujuan_table', 4),
(14, '2022_07_30_122833_create_danas_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ormawa`
--

CREATE TABLE `ormawa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profil` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ormawa`
--

INSERT INTO `ormawa` (`id`, `nama`, `email`, `visi`, `misi`, `profil`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'HIMAUNTIKA', 'himauntikaunis@gmail.com', 'Meningkatkan kualitas dan  kreatifitas mahasiswa khususnya dalam bidang akademik Teknik Informatika guna memajukan sistem komputerisasi Kampus UNIS Tangerang, serta menanamkan jiwa persaudaraan yang dilandaskan dengan iman dan takwa dikalangan mahasiswa Teknik Informatika guna melahirkan mahasiswa yang unggul demi memajukan Fakultas Teknik Informatika UNIS Tangerang agar lebih di kenal oleh masyarakat luas', '1. Membantu kemajuan sistem komputerisasi Fakultas Teknik Informatika dan kampus UNIS Tangerang\r\n2. Membangkitkan mental dan kemampuan terpendam yang dimiliki mahasiswa Teknik Informatika guna membangun mereka agar menjadi pribadi yang mandiri\r\n3. Menyelenggarakan perkumpulan belajar dalam bidang akademik Teknik Informatka guna menciptakan Mahasiswa Teknik Informatika yang Cerdas dan mandiri.\r\n4. Menyiapkan sumber daya manusia yang berkualitas di bidang teknologi\r\nMenghasilkan generasi muda yang terampil, berkualitas, mandiri dan berwawasan luas.\r\n5. Membuat usaha-usaha lain yang sesuai dengan identitas dan azas organisasi serta berguna untuk mencapai tujuan untuk menciptakan mahsiswa dan mahasiswai Fakultas Teknik Informatika yang dapat berkreatifitas dalam bidang akademik Teknik informatika.', 'HIMAUNTIKA (Himpunan Mahasiswa UNIS Teknik Informatika)', 'http://127.0.0.1:8000/storage/photos/himauntika/LOGO.jpg', '2022-07-10 21:24:28', '2022-08-15 16:59:44'),
(2, 'HIMATESI', 'himatesi@gmail.com', 'Visi Organisasi', 'Misi Organisasi', 'Profile Organisasi', 'http://127.0.0.1:8000/storage/photos/himatesi/himatesi.jpg', '2022-07-10 23:32:40', '2022-08-05 04:00:45'),
(5, 'BEM UNIVERSITAS', 'BEM_U@gmail.com', 'Visi', 'Misi', 'Profil', 'http://127.0.0.1:8000/storage/photos/BEM_U/bem.jpeg', '2022-07-18 01:46:20', '2022-08-05 04:02:19'),
(6, 'HIMAMEN', 'himamen@gmail.com', 'visi', 'misi', 'Awal berdiri Himamen Tahun 2014  Yang didirikan oleh kawan-kawan Manajemen Semester 4 s/d 6 dan disamping itu belum legal di Kampus UNIS Tangerang ini di Karna kan Kader anggota nya sedikit.', 'http://127.0.0.1:8000/storage/photos/farras30/himamen.jpg', '2022-07-22 04:05:07', '2022-08-05 04:06:23'),
(7, 'DEWAN MAHASISWA', 'dema@gmail.com', NULL, NULL, NULL, NULL, '2022-07-29 11:58:52', '2022-07-29 11:58:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `persetujuan_id` bigint(20) UNSIGNED NOT NULL,
  `ormawa_id` bigint(20) UNSIGNED NOT NULL,
  `subjek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('proposal','lpj','lainnya') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'lainnya',
  `catatan_revisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('proses','setuju','revisi','tolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'proses',
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `persetujuan_id`, `ormawa_id`, `subjek`, `jenis`, `catatan_revisi`, `status`, `file`, `created_at`, `updated_at`) VALUES
(18, 23, 1, 'Proposal PKKMB 2022', 'proposal', NULL, 'setuju', 'http://127.0.0.1:8000/storage/files/himauntika/Proposal Kegiatan.pdf', '2022-08-18 20:55:57', '2022-08-20 05:55:49'),
(19, 24, 1, 'Proposal Kegiatan PDHM 2022', 'proposal', 'Revisi', 'setuju', 'http://127.0.0.1:8000/storage/files/himauntika/Proposal Kegiatan.pdf', '2022-08-18 21:03:39', '2022-08-20 06:03:49'),
(20, 25, 6, 'Proposal PKKMB 2022', 'proposal', NULL, 'setuju', 'http://127.0.0.1:8000/storage/files/himamen/PAKA06A-Panduan-User-Acceptance-Test-UAT-20170410.pdf', '2022-08-18 23:47:45', '2022-08-18 23:48:40'),
(22, 32, 6, 'Proposal Kegiatan LDKM 2022', 'proposal', NULL, 'setuju', 'http://127.0.0.1:8000/storage/files/himamen/PAKA06A-Panduan-User-Acceptance-Test-UAT-20170410.pdf', '2022-08-19 00:25:13', '2022-08-19 00:26:18'),
(23, 33, 1, 'Laporan Pertanggung Jawaban Teknik Expo 2022', 'lpj', 'Data Pengeluaran Tidak Sesuai', 'revisi', 'http://127.0.0.1:8000/storage/files/himauntika/Laporan Pertanggung Jawaban.pdf', '2022-08-19 14:52:03', '2022-08-20 05:43:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persetujuan`
--

CREATE TABLE `persetujuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baak` tinyint(1) NOT NULL DEFAULT 0,
  `warek` tinyint(1) NOT NULL DEFAULT 0,
  `bem` tinyint(1) NOT NULL DEFAULT 0,
  `dema` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `persetujuan`
--

INSERT INTO `persetujuan` (`id`, `baak`, `warek`, `bem`, `dema`, `created_at`, `updated_at`) VALUES
(23, 2, 0, 0, 0, '2022-08-18 20:55:53', '2022-08-20 05:55:49'),
(24, 2, 2, 2, 2, '2022-08-18 21:03:35', '2022-08-20 06:03:49'),
(25, 2, 0, 0, 0, '2022-08-18 23:47:39', '2022-08-18 23:48:40'),
(32, 2, 0, 0, 0, '2022-08-19 00:25:09', '2022-08-19 00:26:18'),
(33, 1, 0, 0, 0, '2022-08-19 14:51:53', '2022-08-20 05:43:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`) VALUES
(31, 1, 6, 'Optimis Ajak Mengamalkan Ilmu dan Mengilmiahkan Amal', 'optimis-ajak-mengamalkan-ilmu-dan-mengilmiahkan-amal', 'http://humas.unis.ac.id/wp-content/uploads/sites/2/2022/02/TANGERANG-CERDAS_1-770x433-1.jpg', 'TANGERANG &ndash; Mengamalkan ilmu serta mengilmiahkan amal merupakan cara untuk berhasil menggapai dunia dan akhirat. Berdasarkan dengan hadis Rasulu...', '<p style=\"text-align:justify\">TANGERANG &ndash; Mengamalkan ilmu serta mengilmiahkan amal merupakan cara untuk berhasil menggapai dunia dan akhirat. Berdasarkan dengan hadis Rasulullah yang mengajarkan seseorang untuk mencari ilmu. &ldquo;Mengamalkan suatu ilmu merupakan hal baik yang ditunjukkan oleh Allah SWT dan ini sebagai sesuatu yang sangat ilmiah. Sikap ilmiah juga suatu kaitan yang kuat sebagai manusia yang memiliki keilmuan,&rdquo; ujar Prof. Dr. Mustofa Kamil, Dip, RSL.,M.Pd, saat Obrolan Penting Tentang Iman dan Islam (Optimis) Fakultas Ekonomi dan Bisnis (FEB) Unis Tangerang, Rabu (23/2/2022).&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Menurut Kamil, sikap seseorang yang bertindak sebagai perbuatan ilmiah memiliki rasa keingintahuan. &ldquo;Mencari ilmu itu wajib bagi seorang muslim. Rasulullah sudah memberikan isyarat kepada umat manusia bahwa kita harus selalu ingin tahu dan memahami apalagi seorang akademisi,&rdquo; kata Kamil.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Selain itu, manusia juga harus mengimplementasikan keilmuannya di dunia nyata dan memiliki motivasi. &ldquo;Kalau tidak ada motivasi berarti kita tidak mengilmiahkan amal,&rdquo; tambahnya.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Kamil mengatakan, sikap ilmiah selanjutnya adalah jujur yang tertuang pada surat Al-Ahzab Ayat 23. &ldquo;Apa yang dilakukan dalam riset sebagai seorang dosen dalam pengambilan datanya, hanya duduk di belakang meja dan hasil risetnya membohongi, serta tidak jujur maka amal risetnya tidak ilmiah,&rdquo; ungkap Kamil.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Lanjutnya, sikap ilmiah juga harus memiliki ketelitian. Dalam surat Al-Hujarat Ayat 6 dijelaskan untuk tidak melakukan kecerobohan. &ldquo;Allah sudah memberikan gambaran, jika diberikan suatu informasi oleh orang lain atau melakukan sesuatu harus diteliti, dari mana sumber keasliannya,&rdquo; kata Kamil.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Kamil menambahkan, manusia juga harus memiliki sikap tekun. Beribadah kepada Allah dengan tekun serta mengamalkan ilmu dengan sepenuh hati. &ldquo;Kalau kita tidak tekun akan tertinggal oleh kehidupan zaman sekarang,&rdquo; ucapnya.</p>\r\n\r\n<p style=\"text-align:justify\">Serta yang terakhir, sikap ilmiah harus dapat bekerja keras. Sebagai seorang muslim harus mampu bekerja keras. &ldquo;Allah tidak akan membiarkan umatnya dalam kunci kebodohan. Tapi Allah memberikan kunci kesuksesan yang sangat terbuka lebar,&rdquo; kata Kamil.</p>\r\n\r\n<p style=\"text-align:justify\">Sikap ilmiah kata Kamil, menjadi sebuah dasar dalam mengamalkan ilmu agama. Adapun sifat ilmu pengetahuan dikarenakan manusia harus amal ilmiah. &ldquo;Sifat ilmu itu rasional, objektif, empiris dan akumulatif, dan itu sudah menjadi pemikiran kita sebagai seorang akademisi. Tetapi poin utamanya dalam amal ilmiah adalah Al-Qur&rsquo;an dan Hadis,&rdquo; tegas Kamil.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Tambah Kamil, orang yang berilmu akan ditinggikan derajatnya oleh Allah SWT. &ldquo;Sangat beruntunglah kita yang memiliki ilmu dan mengimplementasikannya di kehidupan,&rdquo; imbuhnya. (Vita)</p>', NULL, '2022-07-12 17:35:22', '2022-07-26 03:58:31'),
(34, 2, 8, 'PKM FT Bantu Petani Mauk Lewat Aplikasi', 'pkm-ft-bantu-petani-mauk-lewat-aplikasi', 'http://127.0.0.1:8000/storage/photos/himauntika/WhatsApp Image 2022-07-13 at 23.55.28.jpeg', 'TANGERANG &ndash; Mahasiswa Program Studi (Prodi) Teknik Informatika Universitas Islam Syekh-Yusuf (Unis) Tangerang menciptakan aplikasi monitoring ta...', '<p style=\"text-align:justify\">TANGERANG &ndash; Mahasiswa Program Studi (Prodi) Teknik Informatika Universitas Islam Syekh-Yusuf (Unis) Tangerang menciptakan aplikasi monitoring tanaman hidroponik dan akuaponik berbasis Internet of Things (IoT). Aplikasi tersebut dinamakan Sistem Informasi Monitoring Kontrol Hidroponik (Simkoro) dan Sistem Informasi Monitoring Kontrol Akuaponik(Simkran). Aplikasi itu diperkenalkan dalam peresmian Rumah Kasa Program Pengembangan Pemberdayaan Desa (P3D) dan Program Holistik Pembinaan dan Pemberdayaan Desa (PHP2D), di Desa Tegal Kunir Kidul, Kecamatan Mauk, Kabupaten Tangerang, Senin (28/3/2022).</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://127.0.0.1:8000/storage/photos/himauntika/WhatsApp Image 2022-07-13 at 23.54.40.jpeg\" /></p>\r\n\r\n<p style=\"text-align:justify\">Dosen Fakultas Teknik Vina Septiana Windyasari, S.Kom., M.Kom yang menjadi dosen pendamping program tersebut menjelaskan, P3D merupakan program lanjutan dari PHP2D tahun 2020 yang di dalamnya terdapat perubahan dalam pengembangan aplikasi dan perluasan Rumah Kasa. &ldquo;Untuk P3D ini perbedaannya ada suatu pengembangan dari yang sebelumnya. Baik dari luas rumah kasanya dan juga aplikasinya. Rancangan yang dibuat juga menyesuaikan dengan warga desa yang kurang paham internet. Jadi lebih memudahkan warga dalam menggunakan aplikasi itu,&rdquo; jelas Vina.</p>\r\n\r\n<p style=\"text-align:justify\">Vina menambahkan, sasaran masyarakat program Pengabdian Kepada Masyarakat (PKM) itu adalah petani, dasawisma, dan Karang Taruna. Tujuannya mengedukasi masyarakat cara baru bercocok tanam di lahan yang terbatas. &ldquo;Kami melakukan sosialisasi kalau menanam itu tidak di tanah aja. Tapi bisa melalui media air pada pipa-pipa. Melalui aplikasi, masyarakat dapat memonitor suhu, kelembapan, dan nutrisi pada tanaman,&rdquo; kata Vina.</p>\r\n\r\n<p style=\"text-align:justify\">Vina menambahkan pengembangan aplikasi dilakukan untuk memberi pengingat jadwal panen kepada petani. &ldquo;Kita mereview kembali dari program PHP2D 2020 kalau petani itu suka lupa kapan panennya. Lalu akhirnya ada suatu pengembangan variabel yang ditambahkan dalam aplikasi yaitu kalender masa tanam. Jadi nanti petani bisa langsung input data via aplikasi mulai dari kapan menanam benih, pindah tanam, sampai jadwal panennya di tanggal berapa sebagai bentuk pengingat,&rdquo; kata Vina.</p>\r\n\r\n<p style=\"text-align:justify\">Aplikasi Simkran dan Simkoro&nbsp; berpotensi didaftarkan hak paten. &ldquo;HaKI sedang diproses. Karena ada beberapa persyaratan yang harus dipenuhi baik dari source code program, desain penampilan, dan lainnya. Nama yang akan didaftarkan atas nama Unis dan Fakultas Teknik,&rdquo; tambah Vina.</p>\r\n\r\n<p style=\"text-align:justify\">Berangkat dari hasil program ini, Fakultas Teknik dipercaya Kepala Desa Tegal Kunir Kidul untuk pembudidayaan jamur tiram di program PKM selanjutnya. Vina berharap tidak hanya dari teknik informatika saja yang berkontribusi dalam pengembangan program PHP2D dan P3D ini. Tapi juga fakultas lain ke depannya dapat mengambil peran. &ldquo;Karena banyak juga potensi desa. Fakultas Ekonomi dan Bisnis misalnya nanti dapat membantu dalam memasarkan dan promosi. Saya berharap semua fakultas bersama-sama bisa berkontribusi,&rdquo; ucap Vina. (Linda)</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" class=\"left\" src=\"http://127.0.0.1:8000/storage/photos/himauntika/WhatsApp Image 2022-07-13 at 23.54.39.jpeg\" style=\"height:563px; width:1000px\" /></p>', NULL, '2022-07-13 17:00:06', '2022-07-17 08:37:59'),
(35, 2, 6, 'MAHASISWA UNIS BANTU KORBAN BANJIR SERANG', 'mahasiswa-unis-bantu-korban-banjir-serang', 'https://unis.ac.id/wp-content/uploads/2022/03/MAHASISWA-UNIS-BANTU.jpg', 'Mahasiswa Universitas Islam Syekh &ndash; Yusuf (Unis) Tangerang memberikan bantuan Sembako dan obat &ndash; obatan kepada warga Serang yang terdampak...', '<p style=\"text-align:justify\">Mahasiswa Universitas Islam Syekh &ndash; Yusuf (Unis) Tangerang memberikan bantuan Sembako dan obat &ndash; obatan kepada warga Serang yang terdampak banjir, Minggu (06/03/2022). Kegiatan ini merupakan bentuk kepedulian dari mahasiswa Unis Tangerang untuk korban bencana banjir.</p>\r\n\r\n<p style=\"text-align:justify\">Menurut Ketua Dewan Mahasiswa Unis Tangerang Mahdi, mahasiswa Unis Tangerang sangat antusias membantu. &ldquo;Kami sebelumnya sudah melakukan penggalangan dana selama 3 hari, dan kami merasa punya tanggung jawab</p>\r\n\r\n<p style=\"text-align:justify\">dan rasa iba kepada korban banjir,&rdquo; ujarnya. Lokasi pemberian bantuan di Desa Ciherang, Kecamatan Gunungsari, Kabupaten Serang, Banten, yang sebanyak 20 keluarga rumahnya terendam banjir.</p>\r\n\r\n<p style=\"text-align:justify\">Kepala Desa Ciherang Mulyadi mengaku, desanya merupakan salah satu lokasi yang cukup parah. &ldquo;Kemarin di sini sudah seperti lautan hampir 2 Meter ketinggian air, selain terendam juga ada beberapa rumah yang longsor,&rdquo; kata Mulyadi.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" class=\"right\" src=\"https://unis.ac.id/wp-content/uploads/2022/03/MAHASISWA-UNIS-BANTU-2.jpg\" style=\"float:left; height:362px; width:657px\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Mulyadi mengapresiasi kegiatan mahasiswa Unis Tangerang yang telah membantu warganya. &ldquo;Saya sangat berterimakasih atas kepedulian rekan &ndash; rekan mahasiswa Unis Tangerang yang sudah bergerak memberikan bantuan ini, apalagi mengingat lokasinya juga cukup jauh dari Kota Tangerang,&rdquo; ucap Mulyadi. Lokasi ke dua adalah Kampung Kijaud, Kelurahan Warung Jaud di Kecamatan Kasemen, Kota Serang, Banten. Menurut Awaf (32), tokoh masyarakat setempat, banjir besar sangat tidak terduga. Karena sebelumnya tidak ada banjir sehingga para warga tidak mempunyai kewaspadaan terhadap banjir. &ldquo;Jam 12 siang air datang dari arah selatan akhirnya bendungannya jebol dan airnya masuk ke desa ini.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nSekitar 16 rumah terendam dan 3 rumah hancur karena banjir ini. Alhamdullillah tidak ada korban jiwa dalam banjir besar ini. Hanya saja warga terkena penyakit gatal &ndash; gatal karena banjir ini,&rdquo; ujar Awaf. Awaf menambahkan, desanya tidak tersentuh bantuan dari manapun dan warga bingung untuk meminta bantuan. &ldquo;Alhamdulillah ada bantuan dari mahasiswa Unis Tangerang tersentuh hati masyarakat untuk membantu kami,&rdquo; tutup Awaf. (Azkiya)</p>', NULL, '2022-07-16 10:54:10', '2022-07-16 10:54:10'),
(36, 2, 8, 'Dosen FEB Ajari Warga Cimone Beternak Unggas', 'dosen-feb-ajari-warga-cimone-beternak-unggas', 'http://humas.unis.ac.id/wp-content/uploads/sites/2/2022/02/Alumnus-dan-Mahasiswa-Unis-Raih-Juara-Lomba-Video-2.jpg', 'TANGERANG &ndash; Dosen Fakultas Ekonomi dan Bisnis (FEB) Universitas Islam Syekh-Yusuf (Unis) Tangerang menggelar Pengabdian Kepada Masyarakat (PKM)...', '<p style=\"text-align:justify\">TANGERANG &ndash; Dosen Fakultas Ekonomi dan Bisnis (FEB) Universitas Islam Syekh-Yusuf (Unis) Tangerang menggelar Pengabdian Kepada Masyarakat (PKM) di Cimone Mas Permai 2 Kota Tangerang, Minggu (31/10/21). Kegiatan PKM diikuti oleh dosen FEB Unis Tangerang dan warga sekitar.</p>\r\n\r\n<p style=\"text-align:justify\">Ketua Pelaksana PKM FEB Umi Kulsum menjelaskan, tujuan&nbsp; kegiatan melakukan budi daya ternak unggas di rumah sendiri. Mereka mengedukasi cara terbaru dalam mengolah dan mengembangbiakkan unggas.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Umi mengatakan, beternak unggas merupakan kegiatan untuk mengisi waktu luang selama pandemi. Kegiatan yang selama ini hanya iseng ternyata mempunyai peluang besar untuk usaha. &ldquo;Kami mengajarkan penggunaan alat untuk prosedur menetaskan ayam selama 21 hari. Kemudian diskusi mengenai kandang, pangan,dan produksi telur asin,&rdquo; kata Umi.</p>\r\n\r\n<p style=\"text-align:justify\">Hasil telur yang banyak dapat dijadikan peluang untuk berusaha. &ldquo;Telur unggas yang tidak mau ditetaskan bisa dijual dan menghasilkan uang. Kalau mau ditetaskan harus menunggu 21 hari dan hasilnya akan menjadi anak ayam atau bebek. Dan nanti ayam atau bebeknya juga bisa kita jual,&rdquo; tutup Umi. (Linda)</p>', NULL, '2022-07-17 09:16:21', '2022-07-17 09:16:21'),
(37, 1, 8, 'Himpunan Mahasiswa Komunikasi Unis dan UMT Saling Belajar', 'himpunan-mahasiswa-komunikasi-unis-dan-umt-saling-belajar', 'http://humas.unis.ac.id/wp-content/uploads/sites/2/2022/02/keraton-jogja.jpg', 'TANGERANG &ndash; Himpunan Mahasiswa Ilmu Komunikasi (Himikom) Universitas Islam Syekh &ndash; Yusuf (Unis) Tangerang menjalin silaturahmi dengan Himp...', '<p style=\"text-align:justify\">TANGERANG &ndash; Himpunan Mahasiswa Ilmu Komunikasi (Himikom) Universitas Islam Syekh &ndash; Yusuf (Unis) Tangerang menjalin silaturahmi dengan Himpunan Mahasiswa Ilmu Komunikasi (Himakom) Universitas Muhammadiyah Tangerang (UMT), Minggu (06/03/2022). Dalam pertemuan ini juga dilakukan Study Banding antara organisasi Himpunan Mahasiswa.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Ketua Umum Himikom Muhammad Tegar Rayandra menjelaskan, kegiatan ini merupakan program kerjanya sebagai ketua umum. &ldquo;Ini merupakan Communication Visit kami yang pertama. Bertujuan mencari referensi budaya positif dari Hima Ilmu Komunikasi di luar Unis Tangerang untuk diadopsi sebagai sistem yang baru di Himikom,&rdquo; kata Tegar.</p>\r\n\r\n<p style=\"text-align:justify\">UMT dipilih karena jarak yang cukup dekat dan mudah dijangkau. &ldquo;Iya kami mulai dari kampus yang terdekat dulu dari Unis Tangerang, UMT kan yang paling terdekat. Nantinya Insyaallah kita akan ke kampus &ndash; kampus lainnya untuk menjalin relasi dan menjalin silaturahmi,&rdquo; ucap Tegar.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Menurut Tegar, setelah Study Banding banyak pembelajaran dan budaya organisasi yang dapat diambil. &ldquo;Kami mengkaji bersama khususnya di bidang Ilmu Komunikasi. Selain itu kami juga menggelar games bersama Himakom UMT. Jadi dalam games tersebut kita campur timnya supaya lebih kenal dan akrab satu sama lainnya,&rdquo; kata Tegar.</p>\r\n\r\n<p style=\"text-align:justify\">Menurut Tegar, dengan adanya silaturahmi ini para anggota Himikom Unis Tangerang dapat melihat perbedaan dan melihat kampus lain. Tegar berharap setelah melakukan silaturahmi ada sedikit perubahan untuk masing &ndash; masing oraganisasi. &ldquo;Semoga Himikom juga bisa lebih upgrade lagi dan bisa menjadi wadah untuk mahasiswa Ilmu Komunikasi yang aktif dan selalu berperilaku positif,&rdquo; tutup Tegar. (Azkiya)</p>', NULL, '2022-07-26 03:50:51', '2022-07-26 03:50:51'),
(38, 1, 9, 'Himatesi Gelar Simbades di Sepatan', 'himatesi-gelar-simbades-di-sepatan', 'https://unis.ac.id/wp-content/uploads/2022/03/cropped-unis-weekly-5-2.jpg', 'TANGERANG &ndash; Himpunan Mahasiswa Teknik Sipil (Himatesi) Universitas Islam Syekh-Yusuf (Unis) Tangerang meggelar Program Sipil Membangun Desa (Sim...', '<p style=\"text-align:justify\">TANGERANG &ndash; Himpunan Mahasiswa Teknik Sipil (Himatesi) Universitas Islam Syekh-Yusuf (Unis) Tangerang meggelar Program Sipil Membangun Desa (Simbades) Tahun 2022. Bersama warga Perum Grand Village RT 04 RW.014 Desa Pisangan Jaya, mereka merealisasikan Pembangunan Taman Baca. &ldquo;Selain sebagai program Pengabdian Kepada Masyarakat (PKM), Simbades ini juga merupakan program tahunan kami di Himatesi,&rdquo; ujar Anasrul Kabri, Ketua Umum Himatesi Unis Tangerang.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Anasrul menyampaikan, Program Simbades sudah terealisasikan selama 5 tahun. &ldquo;Kami pernah membuat saluran air yang sebelumnya tidak ada, kemudian 3 kali kami merenovasi mushola serta MCK dan sekarang Taman Baca,&rdquo; katanya.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Menurut Anasrul, semua anggota Himatesi beserta warga setempat turut membantu pembangunan taman baca. &ldquo;Semoga program simbades ini dapat terus berjalan lancar, dan mengajak teman-teman mahasiswa untuk terjun langsung membantu masyarakat,&rdquo; harapnya.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Ketua Pelaksana Simbades Rezky Epnu Yatama mengatakan, tujuan taman baca&nbsp; untuk memberi wadah bagi anak-anak dan masyarakat Perumahan Grand Village dan Warga Desa Pisangan Jaya. &ldquo;Simbades ini program membangun fasilitas warga yang membutuhkan. Kemudian untuk taman baca ini pada umumnya untuk meningkatkan minat baca serta keterampilan berpikir guna menghadapi tantangan di masa depan,&rdquo; ucap Rezky.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Rezky mengungkapkan, warga sekitar sangat antusias mendukung Program Simbades. Warga turut membantu dalam proses pembangunan Taman Baca. Selain memfasilitasi taman baca, Himatesi juga melakukan program pengajaran kepada anak-anak di sekitar perumahan Grand Village. &ldquo;Kalau nanti Taman Baca ini sudah jadi, selanjutnya kami juga mengajar kepada anak-anak di sini. Nanti di bulan Ramadan kami juga akan melaksanakan buka bersama dengan anak-anak dan warga sekitar. Jadi tetap silaturahmi dan tidak terputus,&rdquo; jelasnya.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Rezky berharap, taman baca yang dibangun oleh himatesi dan warga dapat bermanfaat untuk lingkungan sekitar. &ldquo;Dapat dijaga dengan baik, dan dimanfaatkan dengan baik juga,&rdquo; tutupnya. (Vita)</p>', NULL, '2022-07-26 03:54:25', '2022-07-26 03:54:25'),
(40, 1, 8, 'Kegiatan PKKMB UNIS TANGERANG 2020', 'kegiatan-pkkmb-unis-tangerang-2020', 'https://unis.ac.id/wp-content/uploads/2020/10/ggg.jpg', 'TRIBUNJAKARTA.COM, TANGERANG &ndash;&nbsp;Kementerian Pendidikan dan Kebudayaan RI memberikan apresiasi kepada Universitas Islam Syekh-Yusuf (UNIS) Ta...', '<p>TRIBUNJAKARTA.COM, TANGERANG &ndash;&nbsp;Kementerian Pendidikan dan Kebudayaan RI memberikan apresiasi kepada Universitas Islam Syekh-Yusuf (UNIS) Tangerang terkait tata kelola yang baik.</p>\r\n\r\n<p>Kepala Lembaga Layanan Pendidikan Tinggi (LLDikti) Wilayah 4 Jawa Barat-Banten, Uman Suherman mengatakan,&nbsp;<a href=\"https://jakarta.tribunnews.com/tag/unis-tangerang\">UNIS&nbsp;Tangerang</a>&nbsp;memiliki sejumlah Prodi yang baik dan ditunjang dengan jumlah mahasiswa yang banyak.</p>\r\n\r\n<p>Meski di tengah pandemi dan semua perguruan tinggi baik negeri dan swasta alami penurunan penerimaan tetapi UNIS mampu melakukan terobosan dan inovasi dalam sistem pembelajaran sehingga memiliki mahasiswa baru dalam jumlah banyak.</p>\r\n\r\n<p>&ldquo;Namun demikian, pihak kampus jangan merasa puas. Karena tantangan ke depan begitu besar di tengah pandemi yang masih terjadi dalam membentuk karakter mahasiswa yang memiliki karakter dan keterampilan,&rdquo; kata Uman dalam Pengenalan Kehidupan Kampus Bagi Mahasiswa Baru (PKKMB) UNIS secara virtual, Rabu (23/9/2020).</p>\r\n\r\n<p>Prof Uman mengingatkan mahasiswa agar jangan merasa puas dengan status yang ada.</p>\r\n\r\n<p>Tetapi harus memiliki tanggung jawab kepada diri sendiri, orang tua dan bangsa.</p>\r\n\r\n<p>&ldquo;Kita tak hanya sekedar mengejar IPK tetapi juga memiliki tanggung jawab kepada masyarakat atas kontribusi kita kedepan,&rdquo; tambah Uman.</p>\r\n\r\n<p>Sementara, Rektor&nbsp;<a href=\"https://jakarta.tribunnews.com/tag/unis-tangerang\">UNIS&nbsp;Tangerang</a>, Prof. Mustofa Kamil mengatakan, kampusnya telah menerapkan sistem belajar secara online sejak pandemi terjadi bulan Maret 2020.</p>\r\n\r\n<p>Penerapan sistem online ini didukung dengan perangkat yang memadai untuk memudahkan para dosen dan mahasiswa berkomunikasi.</p>\r\n\r\n<p>&ldquo;Meski online, kita tetap melakukan pembentukan karakter mahasiswa karena pembelajaran ini dilakukan secara profesional,&rdquo; tutur Mustofa.</p>\r\n\r\n<p>Diakuinya, sistem belajar secara online berbeda dengan tatap muka.</p>\r\n\r\n<p>Namun, kepercayaan warga dan pemerintah dalam menciptakan lulusan mahasiswa yang berkualitas, maka semua dilakukan secara maksimal.</p>\r\n\r\n<p>Sementara itu, Pengenalan Kehidupan Kampus Bagi Mahasiswa Baru (PKKMB) diikuti ribuan calon mahasiswa baru.</p>\r\n\r\n<p>Di antaranya adalah Ketua DPRD Kota Tangerang, Gatot Wibowo dan Ketua DPRD Kabupaten Tangerang, Kholid Ismail sebagai mahasiswa program pasca-sarjana UNIS.</p>', NULL, '2022-08-17 06:50:47', '2022-08-20 06:17:38'),
(41, 2, 8, 'Lokarya dan Workshop Applikasi SIMKRON', 'lokarya-dan-workshop-applikasi-simkron', 'http://127.0.0.1:8000/storage/photos/himauntika/WhatsApp Image 2022-07-13 at 23.55.28.jpeg', 'TANGERANG &ndash; Mahasiswa Program Studi (Prodi) Teknik Informatika Universitas Islam Syekh-Yusuf (Unis) Tangerang menciptakan aplikasi monitoring ta...', '<p>TANGERANG &ndash; Mahasiswa Program Studi (Prodi) Teknik Informatika Universitas Islam Syekh-Yusuf (Unis) Tangerang menciptakan aplikasi monitoring tanaman hidroponik dan akuaponik berbasis Internet of Things (IoT). Aplikasi tersebut dinamakan Sistem Informasi Monitoring Kontrol Hidroponik (Simkoro) dan Sistem Informasi Monitoring Kontrol Akuaponik(Simkran). Aplikasi itu diperkenalkan dalam peresmian Rumah Kasa Program Pengembangan Pemberdayaan Desa (P3D) dan Program Holistik Pembinaan dan Pemberdayaan Desa (PHP2D), di Desa Tegal Kunir Kidul, Kecamatan Mauk, Kabupaten Tangerang, Senin (28/3/2022).</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/storage/photos/himauntika/WhatsApp Image 2022-07-13 at 23.54.40.jpeg\" /></p>\r\n\r\n<p>Dosen Fakultas Teknik Vina Septiana Windyasari, S.Kom., M.Kom yang menjadi dosen pendamping program tersebut menjelaskan, P3D merupakan program lanjutan dari PHP2D tahun 2020 yang di dalamnya terdapat perubahan dalam pengembangan aplikasi dan perluasan Rumah Kasa. &ldquo;Untuk P3D ini perbedaannya ada suatu pengembangan dari yang sebelumnya. Baik dari luas rumah kasanya dan juga aplikasinya. Rancangan yang dibuat juga menyesuaikan dengan warga desa yang kurang paham internet. Jadi lebih memudahkan warga dalam menggunakan aplikasi itu,&rdquo; jelas Vina.</p>\r\n\r\n<p>Vina menambahkan, sasaran masyarakat program Pengabdian Kepada Masyarakat (PKM) itu adalah petani, dasawisma, dan Karang Taruna. Tujuannya mengedukasi masyarakat cara baru bercocok tanam di lahan yang terbatas. &ldquo;Kami melakukan sosialisasi kalau menanam itu tidak di tanah aja. Tapi bisa melalui media air pada pipa-pipa. Melalui aplikasi, masyarakat dapat memonitor suhu, kelembapan, dan nutrisi pada tanaman,&rdquo; kata Vina.</p>\r\n\r\n<p>Vina menambahkan pengembangan aplikasi dilakukan untuk memberi pengingat jadwal panen kepada petani. &ldquo;Kita mereview kembali dari program PHP2D 2020 kalau petani itu suka lupa kapan panennya. Lalu akhirnya ada suatu pengembangan variabel yang ditambahkan dalam aplikasi yaitu kalender masa tanam. Jadi nanti petani bisa langsung input data via aplikasi mulai dari kapan menanam benih, pindah tanam, sampai jadwal panennya di tanggal berapa sebagai bentuk pengingat,&rdquo; kata Vina.</p>\r\n\r\n<p>Aplikasi Simkran dan Simkoro&nbsp; berpotensi didaftarkan hak paten. &ldquo;HaKI sedang diproses. Karena ada beberapa persyaratan yang harus dipenuhi baik dari source code program, desain penampilan, dan lainnya. Nama yang akan didaftarkan atas nama Unis dan Fakultas Teknik,&rdquo; tambah Vina.</p>\r\n\r\n<p>Berangkat dari hasil program ini, Fakultas Teknik dipercaya Kepala Desa Tegal Kunir Kidul untuk pembudidayaan jamur tiram di program PKM selanjutnya. Vina berharap tidak hanya dari teknik informatika saja yang berkontribusi dalam pengembangan program PHP2D dan P3D ini. Tapi juga fakultas lain ke depannya dapat mengambil peran. &ldquo;Karena banyak juga potensi desa. Fakultas Ekonomi dan Bisnis misalnya nanti dapat membantu dalam memasarkan dan promosi. Saya berharap semua fakultas bersama-sama bisa berkontribusi,&rdquo; ucap Vina. (Linda)</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/storage/photos/himauntika/WhatsApp Image 2022-07-13 at 23.54.39.jpeg\" /></p>', NULL, '2022-08-18 12:27:56', '2022-08-20 06:12:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ormawa_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `role` enum('bem','dema','ormawa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ormawa',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ormawa_id`, `name`, `username`, `email`, `email_verified_at`, `password`, `is_admin`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 6, 'himamen', 'himamen', 'himamen@gmail.com', NULL, '$2y$10$icePS1AuXbsw0CKbvd91heEVSHHUu8O.koEuABrJR8Rxe4O7KQkTe', 2, 'ormawa', NULL, '2022-07-08 14:54:40', '2022-08-18 22:27:52'),
(8, 1, 'Himauntika', 'himauntika', 'himauntikaunis@gmail.com', NULL, '$2y$10$7UvB0DHRrAWD9PXNqrCKse5C/AtXlBfXgekVAyCbMFPNazY.ZL7Q6', 2, 'ormawa', NULL, '2022-07-10 20:55:29', '2022-07-10 21:44:17'),
(9, 2, 'himatesi', 'himatesi', 'himatesi@gmail.com', NULL, '$2y$10$IXlJa2oLmlAzDkSMut51PODVxABPUvryAm8tK8GJzz4oCh41t6QiW', 0, 'ormawa', NULL, '2022-07-10 23:33:57', '2022-07-10 23:33:57'),
(10, 5, 'BEM UNIVERSITAS', 'BEM-UNIS', 'BEM_U@gmail.com', NULL, '$2y$10$pA.5Lw3NU.DZONDMwDhbN.28uDWeE9mIs8Do11QY0AFgh4mfCSoj.', 0, 'bem', NULL, '2022-07-18 01:47:07', '2022-07-18 01:47:38'),
(11, 7, 'DEMA', 'DEMA_U', 'dema@gmail.com', NULL, '$2y$10$JOMeWKrRnviRajCa0xYJ8eTju3WevcV7A0ExbYtzMP5WRx2VsvvUq', 0, 'dema', NULL, '2022-07-29 12:00:00', '2022-07-29 12:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `dana`
--
ALTER TABLE `dana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ormawa`
--
ALTER TABLE `ormawa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `persetujuan`
--
ALTER TABLE `persetujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `ormawa_id` (`ormawa_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dana`
--
ALTER TABLE `dana`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `ormawa`
--
ALTER TABLE `ormawa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `persetujuan`
--
ALTER TABLE `persetujuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
