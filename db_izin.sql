-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2023 pada 16.01
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_izin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name_category` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name_category`, `created_at`, `updated_at`) VALUES
(1, 'DISETUJUI', NULL, NULL),
(2, 'TIDAK DISETUJUI', NULL, NULL),
(3, 'BELUM DIKONFIRMASI', NULL, NULL);

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
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Post', 0, '69cfcb86-3fd8-48cc-b64b-ab19e67b3734', 'images', 'ilmuwan-muslim-penemu-kamera-ibn-al-haytham', 'ilmuwan-muslim-penemu-kamera-ibn-al-haytham.jpg', 'image/jpeg', 'public', 'public', 96076, '[]', '[]', '[]', '[]', 1, '2023-07-17 00:23:35', '2023-07-17 00:23:35'),
(2, 'App\\Models\\Post', 0, '0ab023af-10c7-4717-9c7d-c8a63813b7b1', 'images', 'download (1)', 'download-(1).png', 'image/png', 'public', 'public', 2960, '[]', '[]', '[]', '[]', 2, '2023-07-17 00:24:32', '2023-07-17 00:24:32'),
(3, 'App\\Models\\Post', 0, '3b84615d-1311-4671-8769-715aaa6dcfba', 'images', 'WhatsApp Image 2023-07-10 at 20.03.31', 'WhatsApp-Image-2023-07-10-at-20.03.31.jpeg', 'image/jpeg', 'public', 'public', 123976, '[]', '[]', '[]', '[]', 3, '2023-07-17 00:25:48', '2023-07-17 00:25:48'),
(4, 'App\\Models\\Post', 0, '4f7b0495-e77f-4887-b398-83270a0bfbe7', 'images', 'WhatsApp Image 2023-07-11 at 09.31.17', 'WhatsApp-Image-2023-07-11-at-09.31.17.jpeg', 'image/jpeg', 'public', 'public', 42974, '[]', '[]', '[]', '[]', 4, '2023-07-17 03:58:33', '2023-07-17 03:58:33'),
(5, 'App\\Models\\Post', 0, '484206cf-c57c-4027-9435-75cff1dcba89', 'images', 'ilmuwan-muslim-penemu-kamera-ibn-al-haytham', 'ilmuwan-muslim-penemu-kamera-ibn-al-haytham.jpg', 'image/jpeg', 'public', 'public', 96076, '[]', '[]', '[]', '[]', 5, '2023-07-17 04:08:27', '2023-07-17 04:08:27'),
(6, 'App\\Models\\Post', 0, '080a28d1-89ec-4e4e-a198-ba7014b6b42d', 'images', 'WhatsApp Image 2023-07-11 at 09.31.17', 'WhatsApp-Image-2023-07-11-at-09.31.17.jpeg', 'image/jpeg', 'public', 'public', 42974, '[]', '[]', '[]', '[]', 6, '2023-07-17 04:09:22', '2023-07-17 04:09:22'),
(7, 'App\\Models\\Post', 0, '326c777c-cc05-42a4-acba-25e549d9c826', 'images', 'WhatsApp Image 2023-07-11 at 09.31.17', 'WhatsApp-Image-2023-07-11-at-09.31.17.jpeg', 'image/jpeg', 'public', 'public', 42974, '[]', '[]', '[]', '[]', 7, '2023-07-17 04:10:24', '2023-07-17 04:10:24'),
(8, 'App\\Models\\Post', 0, '577e3dc4-e48b-4de5-91fd-41bd4cb94a79', 'images', 'ilmuwan-muslim-penemu-kamera-ibn-al-haytham', 'ilmuwan-muslim-penemu-kamera-ibn-al-haytham.jpg', 'image/jpeg', 'public', 'public', 96076, '[]', '[]', '[]', '[]', 8, '2023-07-17 04:12:06', '2023-07-17 04:12:06'),
(9, 'App\\Models\\Post', 0, '07f5412d-f9e2-4ebf-91e5-cc42e892fbf9', 'images', 'download (1)', 'download-(1).png', 'image/png', 'public', 'public', 2960, '[]', '[]', '[]', '[]', 9, '2023-07-17 04:12:20', '2023-07-17 04:12:20'),
(10, 'App\\Models\\Post', 0, '6666ae7f-08c0-4f04-8bb8-fd94548481bf', 'images', 'ilmuwan-muslim-penemu-kamera-ibn-al-haytham', 'ilmuwan-muslim-penemu-kamera-ibn-al-haytham.jpg', 'image/jpeg', 'public', 'public', 96076, '[]', '[]', '[]', '[]', 10, '2023-07-17 04:14:34', '2023-07-17 04:14:34'),
(11, 'App\\Models\\Post', 0, '558b51a5-ded3-4e4d-8dc1-db3877d681ea', 'images', 'download (1)', 'download-(1).png', 'image/png', 'public', 'public', 2960, '[]', '[]', '[]', '[]', 11, '2023-07-17 04:17:59', '2023-07-17 04:17:59'),
(12, 'App\\Models\\Post', 0, '087b454c-7a46-4f3c-bd3d-f88341b15efb', 'images', 'new revisi konten tgl 10', 'new-revisi-konten-tgl-10.png', 'image/png', 'public', 'public', 369973, '[]', '[]', '[]', '[]', 12, '2023-07-17 05:59:14', '2023-07-17 05:59:14'),
(13, 'App\\Models\\Post', 0, '8f7b0ff7-835c-42f5-9f3c-93be844791d4', 'images', 'Cara-Mengatasi-Consider-Replacing-Your-Battery', 'Cara-Mengatasi-Consider-Replacing-Your-Battery.webp', 'image/webp', 'public', 'public', 770412, '[]', '[]', '[]', '[]', 13, '2023-07-17 06:36:52', '2023-07-17 06:36:52');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_17_071202_create_media_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('haziexahmad18@gmail.com', '$2y$10$VA2yejsHXZrmX1FAaW7FlOqqxeeatYqdb.bZnVQfrU9ba4xPhCHuO', '2023-07-17 08:11:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categories_id` int(11) NOT NULL,
  `jamkeluar` time DEFAULT NULL,
  `jamkembali` time DEFAULT NULL,
  `telp` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `tujuan`, `created_at`, `updated_at`, `categories_id`, `jamkeluar`, `jamkembali`, `telp`) VALUES
(25, 'Moch. Yazid Syahrilo Mufid', 'moch-yazid-syahrilo-mufid', 'Jalan Santai', '2023-09-16 15:32:14', '2023-09-16 15:32:14', 3, '07:05:00', '11:31:00', NULL),
(26, 'Bayu Indrawan, Fariz, Syahrul, Syaldi, Hilmi, Wisnu, Yazid', 'bayu-indrawan-fariz-syahrul-syaldi-hilmi-wisnu-yazid', 'Bravo', '2023-09-16 16:00:25', '2023-09-16 16:00:25', 3, '07:30:00', '14:00:00', NULL),
(27, 'm irsyad ibrahim faqih', 'm-irsyad-ibrahim-faqih', 'indomaret', '2023-09-16 16:23:02', '2023-09-16 16:23:02', 3, '08:00:00', '10:00:00', NULL),
(28, 'Nadvi', 'nadvi', 'Beli keperluan', '2023-09-16 18:53:49', '2023-09-16 18:53:49', 3, '12:15:00', '01:20:00', NULL),
(29, 'Aldi Sayyid Widiradja', 'aldi-sayyid-widiradja', 'Mau ke indomaret sama beli minuman', '2023-09-16 20:06:30', '2023-09-20 23:22:45', 2, '10:06:00', '11:00:00', NULL),
(36, 'Yazid', 'yazid', 'Ambil uang & beli kuota', '2023-09-21 00:44:53', '2023-09-21 00:49:23', 1, '15:30:00', '17:00:00', NULL),
(37, 'Fariz & bayu indrawan', 'fariz-bayu-indrawan', 'Ambil uang', '2023-09-21 00:50:17', '2023-09-21 04:41:17', 1, '15:30:00', '17:00:00', NULL),
(38, 'Jefrizal', 'jefrizal', 'Beli sabun', '2023-09-21 01:40:17', '2023-09-21 02:02:29', 1, '15:39:00', '05:00:00', NULL),
(40, 'Kevin alexis', 'kevin-alexis', 'Beli kuota', '2023-09-21 01:44:16', '2023-09-21 06:55:24', 1, '15:43:00', '17:00:00', NULL),
(55, 'Bowo & syaldi', 'bowo-syaldi', 'beli sabun mandi sama sabun cuci', '2023-09-21 01:50:12', '2023-09-21 06:48:36', 1, '16:45:00', '18:00:00', NULL),
(56, 'Jefri', 'jefri', 'Bangka Belitung', '2023-09-22 00:18:16', '2023-09-22 00:18:43', 1, '01:25:00', '05:24:00', NULL),
(57, 'Yazid, Bayu, Fariz', 'yazid-bayu-fariz', 'Fotocopy berkas disuruh ust ragil', '2023-09-22 08:57:38', '2023-09-22 09:03:56', 1, '13:00:00', '14:36:00', NULL),
(59, 'Ahmad Haziq', 'ahmad-haziq', 'Alun alun 1', '2023-09-22 16:23:55', '2023-09-28 07:25:45', 1, '12:43:00', '12:45:00', NULL),
(61, 'Mamat dan kevin', 'mamat-dan-kevin', 'Beli peralatan mandi dan nyuci', '2023-09-22 20:00:57', '2023-09-22 20:08:40', 1, '13:05:00', '14:15:00', NULL),
(62, 'Irham', 'irham', 'Beli alat tulis', '2023-09-22 20:03:49', '2023-09-22 20:10:11', 1, '13:07:00', '14:30:00', NULL),
(64, 'Arya dan bowo', 'arya-dan-bowo', 'Arya=beli paketan bowo=beli peralatan belajar', '2023-09-22 20:23:05', '2023-09-22 20:40:11', 1, '13:22:00', '02:30:00', NULL),
(65, 'Zaki Ardian Bowo', 'zaki-ardian-bowo', 'Pasar membeli baju sholat dan narik uang', '2023-09-23 02:55:24', '2023-09-23 03:14:42', 1, '19:54:00', '22:00:00', NULL),
(66, 'Yazid', 'yazid', 'Beli sabun cuci belakang rumah pak yit', '2023-09-23 04:07:29', '2023-09-23 04:09:38', 1, '21:07:00', '22:00:00', NULL),
(67, 'Yazid', 'yazid', 'Sepedaan(olahraga)', '2023-09-23 12:31:35', '2023-09-23 12:32:50', 1, '05:31:00', '07:31:00', NULL),
(68, 'Fariz, bayu indrawan, syaldi, bowo', 'fariz-bayu-indrawan-syaldi-bowo', 'Jogging', '2023-09-23 12:40:39', '2023-09-23 12:42:41', 1, '05:37:00', '07:30:00', NULL),
(69, 'Kevin alexis', 'kevin-alexis', 'Jogging', '2023-09-23 12:43:42', '2023-09-23 12:46:08', 1, '05:43:00', '07:30:00', NULL),
(70, 'Syaldi, fariz, bayu indrawan, kevin, yazid, jalil, hasan, mamad, wisnu, sahrul, bayu Saputra, sakol, hilman, ahmad, haeril, arya', 'syaldi-fariz-bayu-indrawan-kevin-yazid-jalil-hasan-mamad-wisnu-sahrul-bayu-saputra-sakol-hilman-ahmad-haeril-arya', 'Kawula', '2023-09-23 15:52:49', '2023-09-23 16:03:01', 1, '09:00:00', '02:35:00', NULL),
(71, 'Irwan hadi', 'irwan-hadi', 'Kawula', '2023-09-23 15:54:06', '2023-09-23 16:04:07', 1, '09:00:00', '02:35:00', NULL),
(72, 'JefrizalBowoAdrianZaki', 'jefrizalbowoadrianzaki', 'Alun alun', '2023-09-23 16:23:31', '2023-09-23 16:44:50', 1, '09:18:00', '15:00:00', NULL),
(74, 'M.irham dan haris', 'mirham-dan-haris', 'Ke konter beli peralatan mandi', '2023-09-23 16:54:18', '2023-09-23 17:09:54', 1, '10:00:00', '10:40:00', NULL),
(86, 'Abil Arqam Sayuri', 'abil-arqam-sayuri', 'Ke super market/mini market terdekat untuk membeli bahan mandi sabun, odol, shampo dan sabun cuci baju', '2023-09-24 00:13:50', '2023-09-24 00:16:37', 1, '19:50:00', '21:00:00', NULL),
(87, 'Wisnu & Yazid', 'wisnu-yazid', 'Ke counter ganti casing karena baru saja pecah', '2023-09-24 01:29:23', '2023-09-24 01:30:19', 1, '19:30:00', '21:00:00', NULL),
(89, 'Bayu i, erik, faris, kevin', 'bayu-i-erik-faris-kevin', 'Beli peralatan mandi', '2023-09-24 02:57:47', '2023-09-24 03:00:01', 1, '19:57:00', '21:00:00', NULL),
(103, 'Jalil & syahrul', 'jalil-syahrul', 'Cetak foto kamar', '2023-09-24 16:32:36', '2023-09-24 16:35:12', 1, '10:00:00', '13:01:00', '081522552828'),
(104, 'Yazid, bayu, haeril, fariz, mamad', 'yazid-bayu-haeril-fariz-mamad', 'Bravo', '2023-09-24 16:37:39', '2023-09-24 16:45:25', 1, '10:00:00', '02:00:00', '085806882458'),
(111, 'Sahrul', 'sahrul', 'PP Fathul Ulum', '2023-09-24 21:01:03', '2023-09-24 21:05:51', 1, '14:00:00', '06:00:00', '6282229871391'),
(112, 'Wisnu & yazid', 'wisnu-yazid', 'Ke counter ganti casing karena baru saja pecah, dikarenakan kemarin malem tutup & ada orkes', '2023-09-24 23:13:12', '2023-09-24 23:20:14', 1, '16:12:00', '17:00:00', '6282161430985'),
(114, 'Mamat, Hasan ,Syaldi, fariz', 'mamat-hasan-syaldi-fariz', 'Beli sabun', '2023-09-24 23:36:56', '2023-09-24 23:37:38', 1, '16:37:00', '17:20:00', '6285240460026'),
(116, 'HaerilHilmanFariz', 'haerilhilmanfariz', 'Beli peralatan mandi', '2023-09-25 03:54:40', '2023-09-25 03:55:48', 1, '20:53:00', '21:35:00', '6287815536788'),
(129, 'Yazid, fariz, bayu i, kevin', 'yazid-fariz-bayu-i-kevin', 'Ambil uang & periksa mata', '2023-09-25 18:32:14', '2023-09-25 18:34:08', 1, '12:35:00', '02:35:00', '85806882458'),
(156, 'Aldi Sayyid Widiradja', 'aldi-sayyid-widiradja', 'Indomaret', '2023-09-28 00:45:12', '2023-09-28 00:46:10', 1, '09:00:00', '10:00:00', '6285795470175'),
(157, 'Irham, Mamat dan Arya', 'irham-mamat-dan-arya', 'Beli alat mandi', '2023-09-28 02:19:16', '2023-09-28 02:33:44', 1, '09:20:00', '10:30:00', '6287716321159'),
(158, 'Fariz, bayu, syaldi, yazid', 'fariz-bayu-syaldi-yazid', 'Fariz & bayu (ambil uang & beli parfum) yazid & syaldi cukur rambut', '2023-09-28 06:25:29', '2023-09-28 06:58:08', 1, '15:25:00', '17:00:00', '6285806882458'),
(164, 'Haziq', 'haziq', 'Test', '2023-09-28 07:46:07', '2023-09-28 07:46:52', 1, '19:09:00', '12:00:00', '6282363541957'),
(165, 'Ahmad', 'ahmad', 'Tes aplikasi', '2023-09-28 08:12:57', '2023-09-28 08:13:39', 1, '15:30:00', '16:30:00', '6281335280612'),
(166, 'Bayu saputra dan jalil', 'bayu-saputra-dan-jalil', 'Beli parfum', '2023-09-28 08:58:25', '2023-09-28 09:01:20', 1, '15:57:00', '17:00:00', '6282127612962'),
(167, 'Fariz dan bayu i', 'fariz-dan-bayu-i', 'Tf uang dan beli sabun mandi', '2023-09-28 11:22:33', '2023-09-28 11:24:27', 1, '18:21:00', '19:15:00', '6285779031954'),
(169, 'yazid dan hilman', 'yazid-dan-hilman', 'servis hp dikarenakan layarnya lepas (service ditinggal, tidak ditunggu)', '2023-09-29 02:32:02', '2023-09-29 02:40:20', 1, '12:35:00', '13:15:00', '6285806882458'),
(170, 'M irsyad ibrahim faqih', 'm-irsyad-ibrahim-faqih', 'Mengambil ijazah pada hari Sabtu', '2023-09-29 06:04:22', '2023-09-29 06:05:57', 1, '08:00:00', '14:00:00', '6285855499379'),
(171, 'Haeril dan fariz dan saldi', 'haeril-dan-fariz-dan-saldi', 'Beli sabun', '2023-09-29 06:11:38', '2023-09-29 07:45:52', 1, '13:11:00', '02:30:00', '6283122870249'),
(172, 'Ahmad Haziq', 'ahmad-haziq', 'Test', '2023-09-29 07:37:48', '2023-09-29 07:38:22', 1, '15:30:00', '16:00:00', '6281335280612'),
(173, 'Yazid & hilman', 'yazid-hilman', 'Ambil hp', '2023-09-29 11:19:50', '2023-09-29 11:21:46', 1, '19:30:00', '20:30:00', '6285806882458'),
(174, 'Hasan, Mamat dan fariz', 'hasan-mamat-dan-fariz', 'Ngambil hp beli voucher', '2023-09-29 11:40:05', '2023-09-29 11:53:07', 1, '20:10:00', '21:10:00', '6289673674341'),
(175, 'Bayu i', 'bayu-i', 'Beli kuota', '2023-09-29 12:11:45', '2023-09-29 12:18:28', 1, '19:30:00', '20:30:00', '6285806882458'),
(176, 'Syaldi', 'syaldi', 'Ambil uang', '2023-09-29 12:31:54', '2023-09-29 12:34:42', 1, '19:31:00', '20:30:00', '6285240460026'),
(177, 'Ahmad Haziq', 'ahmad-haziq', 'Tes aplikasi', '2023-09-29 13:56:45', '2023-09-29 13:57:37', 1, '20:30:00', '21:00:00', '6281335280612'),
(178, 'Ahmad & Bowo', 'ahmad-bowo', 'Warung beli sabun', '2023-09-30 02:23:27', '2023-09-30 02:23:27', 3, '09:22:00', '11:00:00', '62881010967388'),
(179, 'Ahmad & Bowo', 'ahmad-bowo', 'Warung beli sabun', '2023-09-30 02:28:50', '2023-09-30 03:11:32', 1, '09:28:00', '11:00:00', '62881010967388'),
(180, 'M irsyad ibrahim faqih', 'm-irsyad-ibrahim-faqih', 'Ke indomaret', '2023-10-01 00:52:25', '2023-10-01 00:53:42', 1, '08:00:00', '10:00:00', '6285855499379'),
(181, 'Yazid, bayu i, syaldi', 'yazid-bayu-i-syaldi', 'Beli kuota', '2023-10-01 01:06:31', '2023-10-01 01:08:59', 1, '08:25:00', '10:00:00', '6285806882458'),
(182, 'Fariz,Mamat,dan hairil', 'farizmamatdan-hairil', 'Beli alat mandi', '2023-10-01 05:22:56', '2023-10-01 05:25:38', 1, '12:30:00', '02:35:00', '6289673674341'),
(183, 'Yazid, bayu, bowo', 'yazid-bayu-bowo', 'Beli kuota', '2023-10-01 05:46:50', '2023-10-01 05:53:02', 1, '13:00:00', '14:35:00', '6285806882458'),
(184, 'Syaldi', 'syaldi', 'Beli sabun', '2023-10-01 06:11:59', '2023-10-01 08:37:06', 1, '13:11:00', '14:35:00', '6285806882458'),
(185, 'AhmadKevin', 'ahmadkevin', 'Beli barang kebutuhan', '2023-10-01 06:22:27', '2023-10-01 08:37:52', 1, '14:30:00', '15:34:00', '6285240460026'),
(186, 'M. Irham  wardiono m. Zacky ilham', 'm-irham-wardiono-m-zacky-ilham', 'Tika chell', '2023-10-01 07:07:12', '2023-10-01 08:38:27', 1, '15:40:00', '17:16:00', '6285654599539'),
(187, 'Yazid, bowo, bayu', 'yazid-bowo-bayu', 'Jahit baju', '2023-10-01 11:31:15', '2023-10-01 11:50:23', 1, '19:30:00', '21:00:00', '6285806882458'),
(188, 'Sahrul, Fariz', 'sahrul-fariz', 'Ke atm dan beli jus', '2023-10-01 12:28:19', '2023-10-01 12:59:07', 1, '19:30:00', '20:00:00', '6282229871391'),
(189, 'Syaldi', 'syaldi', 'Beli per mandi', '2023-10-01 12:33:05', '2023-10-01 13:00:05', 1, '19:32:00', '20:30:00', '6285240460026'),
(190, 'Yazid, bayu, fariz', 'yazid-bayu-fariz', 'Ambil baju jahitan & ambil uang', '2023-10-02 03:59:50', '2023-10-02 05:41:39', 1, '15:30:00', '17:00:00', '6285806882458'),
(191, 'Syaldi', 'syaldi', 'Ambil uang', '2023-10-02 06:34:52', '2023-10-02 07:04:05', 1, '15:35:00', '17:00:00', '62 852-4046-0026'),
(192, 'Bagus Harni Bowo', 'bagus-harni-bowo', 'Konter', '2023-10-02 06:59:51', '2023-10-02 07:04:31', 1, '13:59:00', '04:59:00', '6282286232870'),
(193, 'Ahmad, haeril, fariz', 'ahmad-haeril-fariz', 'Beli sabun dan cari makan', '2023-10-02 12:17:17', '2023-10-02 12:33:00', 1, '20:25:00', '21:00:00', '6287815536788'),
(201, 'Bayu fariz syaldi', 'bayu-fariz-syaldi', 'Joging + cari makan', '2023-10-03 07:09:22', '2023-10-03 07:12:31', 1, '15:30:00', '17:00:00', '6285806882458'),
(202, 'Ahmad , Bowo', 'ahmad-bowo', 'Warung', '2023-10-03 08:33:24', '2023-10-03 08:53:20', 1, '15:32:00', '17:00:00', '6282286232870'),
(203, 'Yazid', 'yazid', 'Nge print', '2023-10-03 08:44:59', '2023-10-03 08:52:29', 1, '15:44:00', '17:00:00', '6285806882458'),
(204, 'Kevin alexis', 'kevin-alexis', 'Beli kuota', '2023-10-03 08:47:25', '2023-10-03 08:51:21', 1, '15:46:00', '16:47:00', '6289518209310'),
(205, 'Muhammad Hanif Nuruddin Jabbar', 'muhammad-hanif-nuruddin-jabbar', 'Joging', '2023-10-03 12:16:02', '2023-10-03 22:08:27', 1, '06:00:00', '06:15:00', '6285649459170'),
(207, 'Kevin alexis', 'kevin-alexis', 'Joging', '2023-10-03 22:14:45', '2023-10-03 22:16:14', 1, '05:12:00', '06:12:00', '62089518209310'),
(208, 'Yazid, bayu, bowo, kevin, ahmad, syaldi, haeril', 'yazid-bayu-bowo-kevin-ahmad-syaldi-haeril', 'Jogging', '2023-10-03 22:16:55', '2023-10-03 22:17:54', 1, '05:16:00', '06:30:00', '6285806882458'),
(209, 'Fariz', 'fariz', 'Jogging', '2023-10-03 22:25:21', '2023-10-03 22:32:31', 1, '05:25:00', '06:30:00', '6285806882458'),
(210, 'Mamat zefrizal', 'mamat-zefrizal', 'Joging', '2023-10-03 22:44:51', '2023-10-04 00:12:22', 1, '05:44:00', '06:30:00', '6289673674341'),
(211, 'Ilman', 'ilman', 'Joging', '2023-10-03 22:48:10', '2023-10-04 00:13:29', 1, '05:47:00', '06:30:00', '6289673674341'),
(215, 'fariz dan bayu', 'fariz-dan-bayu', 'ke indomaret dan atm', '2023-10-04 06:13:14', '2023-10-04 06:14:20', 1, '15:30:00', '17:00:00', '6283122870249'),
(216, 'KevinAhmadYasidSaldiHairil', 'kevinahmadyasidsaldihairil', 'Jalan sore', '2023-10-04 08:30:53', '2023-10-04 08:36:02', 1, '15:29:00', '17:00:00', '6289518209310'),
(217, 'Bowo Jefri', 'bowo-jefri', 'Beli peralatan mandi', '2023-10-04 09:11:42', '2023-10-04 09:50:52', 1, '16:11:00', '17:00:00', '6282286232870'),
(218, 'Yazid', 'yazid', 'Joging', '2023-10-04 14:55:54', '2023-10-04 14:58:06', 1, '05:45:00', '06:30:00', '6285806882458'),
(221, 'Yazid & Hilman', 'yazid-hilman', 'beli voucher internet', '2023-10-05 02:02:08', '2023-10-05 02:07:59', 1, '13:00:00', '14:30:00', '6285806882458'),
(222, 'Bayu, kevin, fariz, bowo, syaldi', 'bayu-kevin-fariz-bowo-syaldi', 'Beli peralatan mandi', '2023-10-05 06:12:28', '2023-10-05 06:49:06', 1, '13:12:00', '14:30:00', '6285806882458'),
(223, 'Haeril dan fariz', 'haeril-dan-fariz', 'Ngambil uang di atm dennanyar dan indomaret', '2023-10-05 09:05:42', '2023-10-05 09:09:03', 1, '16:03:00', '17:10:00', '6287815536788'),
(224, 'M. Haiqal dhikrullah', 'm-haiqal-dhikrullah', 'Sabtu sampai senin pagi karena ada acara di mojokerto', '2023-10-06 00:36:15', '2023-10-06 08:26:45', 1, '08:00:00', '07:00:00', '6285230034027'),
(225, 'M. Haiqal dhikrullah', 'm-haiqal-dhikrullah', 'Sabtu sampai senin pagi karena ada acara di mojokerto', '2023-10-06 00:36:44', '2023-10-06 08:27:58', 1, '08:00:00', '07:00:00', '6285230034027'),
(226, 'Faris, syaldi, bayu', 'faris-syaldi-bayu', 'Joging', '2023-10-06 07:40:39', '2023-10-06 08:29:59', 1, '15:10:00', '17:00:00', '6283122870249'),
(227, 'Hilman, farisz, heril', 'hilman-farisz-heril', 'Ke bravo dan kawula', '2023-10-07 01:19:02', '2023-10-07 01:28:03', 1, '21:50:00', '14:35:00', '6285770959360'),
(228, 'Sahrul', 'sahrul', 'Pondok Fathul ulum', '2023-10-07 01:30:23', '2023-10-07 02:35:01', 1, '09:00:00', '16:00:00', '6282229871391'),
(229, 'Haris', 'haris', 'Counter', '2023-10-07 01:40:25', '2023-10-07 02:35:55', 1, '09:00:00', '10:30:00', '6287879773883'),
(230, 'Irsyad', 'irsyad', 'Ke indomaret', '2023-10-07 04:57:33', '2023-10-07 05:34:56', 1, '12:30:00', '14:00:00', '6285855499379'),
(231, 'Yazid & Abil', 'yazid-abil', 'Top up dana', '2023-10-07 05:14:45', '2023-10-07 05:36:51', 1, '15:30:00', '17:00:00', '6285806882458'),
(232, 'Aldi Sayyid', 'aldi-sayyid', 'Mau ambil uang ke indomaret kh bisri', '2023-10-07 05:45:50', '2023-10-08 04:03:43', 1, '13:00:00', '13:30:00', '62'),
(233, 'Yazid, fariz, bayu i, bowo, syaldi, ahmad', 'yazid-fariz-bayu-i-bowo-syaldi-ahmad', 'Joglo', '2023-10-08 00:54:58', '2023-10-08 04:27:32', 1, '09:00:00', '14:35:00', '6285806882458'),
(234, 'Fariz, syaldi, bayu indrawan, ahmad, yazid, bowo, haeril', 'fariz-syaldi-bayu-indrawan-ahmad-yazid-bowo-haeril', 'Ke joglo', '2023-10-08 02:08:05', '2023-10-08 04:54:50', 1, '09:07:00', '14:35:00', '6283122870249'),
(235, 'Hasan, bayu s, kevin', 'hasan-bayu-s-kevin', 'Cafe joglo', '2023-10-08 05:14:43', '2023-10-08 05:14:43', 3, '12:30:00', '14:35:00', '6282127612962'),
(236, 'Wisnu dan yazid', 'wisnu-dan-yazid', 'Beli sabun cuci, dan pelajaran mandi', '2023-10-08 09:44:17', '2023-10-08 10:05:30', 1, '16:45:00', '17:10:00', '6282161430985'),
(237, 'Muhammad Hanif Nuruddin JabbarM. Fasrul Fais IlmanJefrizalAryadi Sumantri', 'muhammad-hanif-nuruddin-jabbarm-fasrul-fais-ilmanjefrizalaryadi-sumantri', 'Joging', '2023-10-09 12:18:40', '2023-10-09 13:19:49', 1, '06:00:00', '06:30:00', '6285649459170'),
(238, 'Yazid', 'yazid', 'Bersepeda', '2023-10-09 13:12:44', '2023-10-09 13:19:12', 1, '05:30:00', '06:30:00', '6285806882458'),
(239, 'Bayu,saldi,faris,kevin,yazid dan ahmad.', 'bayusaldifariskevinyazid-dan-ahmad', 'Jalan2 sore', '2023-10-10 08:30:52', '2023-10-10 08:53:54', 1, '15:29:00', '16:30:00', '6289518209310'),
(240, 'Yazid, fariz, syaldi, bayu', 'yazid-fariz-syaldi-bayu', 'Jalan sore', '2023-10-10 08:35:50', '2023-10-10 08:40:13', 1, '15:35:00', '16:50:00', '6285806882458'),
(241, 'Bagus Harni Bowo', 'bagus-harni-bowo', 'Membeli sendal swallow di warung', '2023-10-10 08:51:10', '2023-10-10 08:53:30', 1, '15:50:00', '16:50:00', '6282286232870'),
(242, 'Muhammad Hanif Nuruddin JabbarM. Fasrul Fais IlmanJefrizal', 'muhammad-hanif-nuruddin-jabbarm-fasrul-fais-ilmanjefrizal', 'Joging', '2023-10-10 12:09:20', '2023-10-10 22:49:21', 1, '06:00:00', '06:20:00', '6285649459170'),
(243, 'Yazid, syaldi, Fariz, Bayu i, kevin', 'yazid-syaldi-fariz-bayu-i-kevin', 'Jogging', '2023-10-10 15:26:19', '2023-10-10 22:50:17', 1, '05:30:00', '06:30:00', '6285240460026'),
(244, 'Yazid', 'yazid', 'Print bacaan dzikir shubuh dan ashar buat hafalan', '2023-10-11 00:35:24', '2023-10-11 00:38:16', 1, '15:50:00', '17:00:00', '6285806882458'),
(245, 'Yazid dan bayu', 'yazid-dan-bayu', 'Print dzikir shubuh dan ashar buat hafalan', '2023-10-11 05:16:41', '2023-10-11 05:20:10', 1, '12:16:00', '14:30:00', '6285806882458'),
(246, 'Sahrul', 'sahrul', 'Pondok Lirboyo', '2023-10-11 05:25:33', '2023-10-11 09:37:13', 1, '14:00:00', '20:00:00', '6282229871391'),
(247, 'Bowo, kevin, saldi, faris dan yazid.', 'bowo-kevin-saldi-faris-dan-yazid', 'Jalan2 sore', '2023-10-11 09:29:46', '2023-10-11 09:37:57', 1, '16:29:00', '17:00:00', '6289518209310'),
(248, 'Haeril fariz hilman', 'haeril-fariz-hilman', 'Tujuan konter, ambil uang, indomaret', '2023-10-12 04:41:56', '2023-10-12 05:03:16', 1, '12:10:00', '14:35:00', '6287815536788'),
(249, 'Sahrul Fariz', 'sahrul-fariz', 'Bravo', '2023-10-13 08:33:23', '2023-10-13 08:37:53', 1, '15:40:00', '17:00:00', '6282229871391'),
(250, 'M. Haiqal dhikrullah', 'm-haiqal-dhikrullah', 'Sabtu sampai senin sore pagi karena ada acara di sidoarjo', '2023-10-13 13:37:21', '2023-10-13 13:37:21', 3, '15:00:00', '07:00:00', '6285230034027'),
(251, 'Bayu indrawan dan fariz', 'bayu-indrawan-dan-fariz', 'Ngambil uang dan cukur rambut', '2023-10-14 06:49:47', '2023-10-14 06:49:47', 3, '14:00:00', '05:00:00', '62'),
(252, 'Bayu Indrawan dan Fariz', 'bayu-indrawan-dan-fariz', 'Ngambil uang dan cukur rambut', '2023-10-14 06:50:30', '2023-10-14 06:54:46', 1, '14:00:00', '17:00:00', '6283122870249'),
(253, 'Kevin dan bayu', 'kevin-dan-bayu', 'Ambil uang', '2023-10-14 11:22:30', '2023-10-14 11:39:09', 1, '18:21:00', '20:00:00', '6289518209310'),
(254, 'M. Ady Saputra', 'm-ady-saputra', 'Ke mini market', '2023-10-14 22:45:40', '2023-10-14 22:45:40', 3, '05:44:00', '09:00:00', '6285783116124'),
(255, 'M. Ady Saputra', 'm-ady-saputra', 'Ke mini market', '2023-10-14 22:47:35', '2023-10-14 22:47:35', 1, '05:47:00', '09:00:00', '6285783116124'),
(256, 'Irsyad', 'irsyad', 'Indomaret', '2023-10-15 01:00:49', '2023-10-15 01:19:37', 1, '08:00:00', '11:00:00', '6285855499379'),
(257, 'Sahrul, haeril, bayu Indrawan, Fariz, yazid, saldi', 'sahrul-haeril-bayu-indrawan-fariz-yazid-saldi', 'Borobudur jombang kota', '2023-10-15 01:07:42', '2023-10-15 01:20:14', 1, '09:00:00', '14:35:00', '6283122870249'),
(258, 'Ma\'ariful Haris', 'maariful-haris', 'Minimarket', '2023-10-15 01:16:27', '2023-10-15 01:20:42', 1, '09:15:00', '10:20:00', '6287879773883'),
(259, 'Kevin', 'kevin', 'Ke borobudur kota jombang', '2023-10-15 02:22:09', '2023-10-15 02:33:49', 1, '09:21:00', '14:35:00', '6289518209310'),
(260, 'Bayu saputra', 'bayu-saputra', 'Borobudur jombang kota', '2023-10-15 03:26:26', '2023-10-15 04:02:51', 1, '10:30:00', '14:35:00', '6282127612962'),
(261, 'Hilman', 'hilman', 'Konter membeli kabel data', '2023-10-15 05:13:42', '2023-10-15 05:14:31', 1, '12:30:00', '13:30:00', '6285770959360'),
(262, 'M.zacky.Hasan.mamat', 'mzackyhasanmamat', 'Mengantar pesanan Ke kantor J&T dan indomaret', '2023-10-15 05:16:30', '2023-10-15 06:23:56', 1, '12:20:00', '16:00:00', '62 081277017696');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AHMAD HAZIQ MU\'IZZADDIN WAFIQ', 'haziexahmad18@gmail.com', NULL, '$2y$10$H.jwqNwt/Ogdj40t8lmVpuoFN3S5Cok4n/wfIC9G9Eh5tkb5yb1SG', NULL, '6IOAlvqlGNkdzxvlKJlMcbrFTm0gG13LFBjUinVE4VH7BeAsAyy90AzULxhS', '2023-07-14 22:44:25', '2023-07-14 22:44:25'),
(3, 'Firdaus', 'firdausAfr@gmail.com', NULL, '$2y$10$/WCyq/i467aXcyD/Y0hJYuvUYDXTrmsDWyUNFgy1aF.VlbOosMDeK', NULL, NULL, '2023-07-17 08:17:14', '2023-07-17 08:17:14'),
(4, 'PeTIK Jombang', 'petikjombang22@gmail.com', NULL, '$2y$10$WUCsLrfvXF1SXysIuusT7.28zzNx740j.OuaYhGozQIKcQx2k7fge', NULL, 'VdvF1t64FWZrnfE0cbmnJ3M04MchdgJ7x8W5NcXLt2H2AJTCfpIdTKNBEX0p', '2023-09-26 17:12:49', '2023-09-26 17:12:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
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
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD KEY `fk_post_categories1_idx` (`categories_id`);

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
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_post_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
