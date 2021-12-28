-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2020 at 01:35 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'igJJRGaNahJv4OwJR5Grhht8CsevkeTR', 1, '2019-09-05 08:40:25', '2019-09-05 08:40:25', '2019-09-05 08:40:25'),
(2, 2, 'yW1CM9J4RMIo7vXFeqWSneYcBHvpaDYU', 1, '2019-09-16 08:38:10', '2019-09-16 08:38:10', '2019-09-16 08:38:10'),
(3, 3, '654maceuCD22M2AaDAFl8xX2foTDW8Pg', 1, '2020-11-03 19:05:33', '2020-11-03 19:05:33', '2020-11-03 19:05:33'),
(4, 5, 'Pn06yuTUPYYfCzTrUoI0SGgCCuNa8Wc4', 1, '2020-11-10 08:29:16', '2020-11-10 08:29:16', '2020-11-10 08:29:16'),
(5, 7, 'ZMcK4CNP7Gbfn6NX1WNimokgCoB8OKE1', 1, '2020-11-10 08:30:58', '2020-11-10 08:30:58', '2020-11-10 08:30:58'),
(6, 9, 'IQj4GWk5SBge4EfWHqkRm4FMw62ZAFYK', 1, '2020-11-10 08:37:57', '2020-11-10 08:37:57', '2020-11-10 08:37:57'),
(7, 10, 'qEi6ebGygM7dIL3XvweWVCxBgNAgH7vR', 1, '2020-11-10 08:39:20', '2020-11-10 08:39:20', '2020-11-10 08:39:20'),
(8, 12, 'VYt72KE4QagrGDV3xuKGVYWaw7AhXqtS', 1, '2020-11-10 08:45:51', '2020-11-10 08:45:51', '2020-11-10 08:45:51'),
(9, 13, '34oUDeLosmHps7hncMbN88CaO7y2QuOV', 1, '2020-11-10 08:46:57', '2020-11-10 08:46:57', '2020-11-10 08:46:57'),
(10, 14, 'KdgJDzwKra0AIGfB0BXWJJAmox1brlgn', 1, '2020-11-10 08:48:03', '2020-11-10 08:48:03', '2020-11-10 08:48:03'),
(11, 15, 'UIacPNym4zO66Ws5uxlLNtcunBkRYzRi', 1, '2020-11-11 07:53:37', '2020-11-11 07:53:37', '2020-11-11 07:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `reporting_to` int(11) DEFAULT '0',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` enum('','Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `photo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('New','Active','Suspended','Locked') COLLATE utf8mb4_unicode_ci DEFAULT 'New',
  `email_verified_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_folder` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `golongans`
--

CREATE TABLE `golongans` (
  `id` int(11) NOT NULL,
  `nama_gol` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongans`
--

INSERT INTO `golongans` (`id`, `nama_gol`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'IV/A', NULL, '2020-11-20 22:49:11', 0, 1),
(3, 'IV/C', '2020-11-20 22:49:19', '2020-11-20 22:49:19', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `incidents`
--

CREATE TABLE `incidents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tgl_insiden` timestamp NULL DEFAULT NULL,
  `ket_pelapor` text,
  `stat` int(1) DEFAULT NULL,
  `stat_lapor` int(11) DEFAULT NULL,
  `handler_id` int(11) DEFAULT NULL,
  `jenis_insiden` varchar(100) DEFAULT NULL,
  `cakupan_insiden` varchar(100) DEFAULT NULL,
  `jumlah_sistem` varchar(100) DEFAULT NULL,
  `jumlah_pengguna` varchar(100) DEFAULT NULL,
  `pihak_ketiga` text,
  `dampak_insiden` varchar(100) DEFAULT NULL,
  `sensitivita_informasi` text,
  `data_enkripsi` varchar(100) DEFAULT NULL,
  `besar_data` varchar(100) DEFAULT NULL,
  `sumber_serangan` text,
  `tujuan_serangan` text,
  `ip_sistem` text,
  `domain_sistem` text,
  `fungsi` text,
  `so` text,
  `patching_level` text,
  `security_sistem` text,
  `lokasi` text,
  `level_hak_akses` text,
  `tindakan_identifikasi` text,
  `tindakan_pemulihan` text,
  `tindakan_pencegahan` text,
  `tgl_ditangani` date DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incidents`
--

INSERT INTO `incidents` (`id`, `user_id`, `tgl_insiden`, `ket_pelapor`, `stat`, `stat_lapor`, `handler_id`, `jenis_insiden`, `cakupan_insiden`, `jumlah_sistem`, `jumlah_pengguna`, `pihak_ketiga`, `dampak_insiden`, `sensitivita_informasi`, `data_enkripsi`, `besar_data`, `sumber_serangan`, `tujuan_serangan`, `ip_sistem`, `domain_sistem`, `fungsi`, `so`, `patching_level`, `security_sistem`, `lokasi`, `level_hak_akses`, `tindakan_identifikasi`, `tindakan_pemulihan`, `tindakan_pencegahan`, `tgl_ditangani`, `created_at`, `updated_at`) VALUES
(1, 2, '2019-09-17 14:28:00', 'keterangan', 3, 1, 1, 'jdf', 'Kritis', '2', '3', 'fdsf', 'fd', 'fds', 'Ya', '33', 'fdfd', 'fd', 'fds', 'fds', 'fds', 'fd', 'dsf', 'fsd', 'fds', 'fds', 'fds', 'fds', 'fsd', '2019-09-23', '2019-09-17 07:50:32', '2019-09-22 06:35:46'),
(2, 2, '2020-11-04 01:54:00', 'website kota down, request time out', 6, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-03 18:55:33', '2020-11-17 06:59:26'),
(3, 2, '2020-11-16 13:01:00', 'aplikasi sipd tidak bisa dibuka', 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-16 06:01:59', '2020-11-16 06:05:59'),
(4, 2, '2020-11-16 13:06:00', 'website kota down', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-16 06:07:15', '2020-11-16 06:46:07'),
(5, 2, '2020-11-17 12:49:00', 'jaringan down lagi', 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-17 05:50:18', '2020-11-17 06:00:28'),
(6, 2, '2020-11-17 12:50:00', 'aplikasi error', 3, 1, 13, 'jenis', 'Kritis', '20', '30', 'ds', 'sad', 'dsad', 'Ya', '30', 'sumber', 'tujuan', '33432', 'nama somain', 'function', 'ad', 'dasd', 'dsa', 'dsad', 'dasd', 'sads', 'sads', 'dsa', '2020-11-17', '2020-11-17 05:51:01', '2020-11-17 07:32:34'),
(7, 2, '2020-11-17 12:49:00', 'jaringan bermasalah', 3, 0, 14, 'kabel putus', 'Sedang', '2', '2', 'tidak ada', 'komputer mati', '-', 'Ya', '2', 'kabel utama', '-', '192.68.1.1.87', 'www.google.com', 'searh engine', 'windows', '-', '-', 'Diskominforarpus', '-', '-', '-', '-', '2020-12-05', '2020-11-24 06:55:41', '2020-11-24 07:23:04'),
(8, 2, '2019-11-30 23:00:00', 'aplikasi mau diupdate', 3, 1, 13, 'ingin update aplikasi', 'Besar', '2', '2', '2', '-', '-', 'Ya', '22', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '2020-11-24', '2020-11-24 06:59:25', '2020-11-24 07:31:40'),
(9, 2, '2020-11-17 12:49:00', 'gagal update', 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-24 06:59:51', '2020-11-26 17:05:36'),
(10, 2, '2020-11-24 15:35:00', 'error saat buka apliksai', 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-24 15:36:12', '2020-11-25 12:13:56'),
(11, 2, '2020-11-24 15:42:00', 'jehkhkj', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-24 15:42:43', '2020-11-25 12:15:30'),
(12, 2, '2020-11-24 17:03:00', 'aplikasi rusak', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-24 17:05:10', '2020-11-25 12:16:08'),
(13, 2, '2019-12-16 23:00:00', 'baru', 3, 1, 13, 'jenis', 'Kritis', '0', '0', '-', '-', '-', 'Tidak', '9', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '2020-11-28', '2020-11-24 17:07:18', '2020-11-25 12:23:54'),
(14, 2, '2020-11-25 12:47:00', 'hahaha', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-25 12:48:23', '2020-11-25 12:48:37'),
(15, 2, '2020-11-17 12:50:00', 'Kerusakan jaringan', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-26 16:04:59', '2020-11-26 16:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `instansis`
--

CREATE TABLE `instansis` (
  `id` int(11) NOT NULL,
  `nama_ins` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansis`
--

INSERT INTO `instansis` (`id`, `nama_ins`, `created_at`, `updated_at`) VALUES
(1, 'Diskominfoarpus', NULL, NULL),
(2, 'Dinas Kesehatan', NULL, NULL),
(3, 'Dinas Pendidikan', NULL, NULL),
(4, 'Kepala Dinas Sosial, Pengendalian Penduduk dan Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak', NULL, NULL),
(5, 'Dinas Kependudukan dan Pencatatan Sipil', NULL, NULL),
(6, 'Dinas Pangan dan Pertanian', NULL, NULL),
(7, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu ', NULL, NULL),
(8, 'Badan Pengelola Pendapatan Daerah', NULL, NULL),
(9, 'RSUD Cibabat', NULL, NULL),
(10, 'Kecamatan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` int(11) NOT NULL,
  `nama_jab` varchar(300) NOT NULL,
  `tingkatan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama_jab`, `tingkatan`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Kepala Dinas\r\n', NULL, NULL, NULL, NULL, NULL),
(3, 'Kepala Subbagian Keuangan, Kepegawaian dan Umum', NULL, NULL, NULL, NULL, NULL),
(4, 'Kepala Subbagian Program dan Informasi', NULL, NULL, NULL, NULL, NULL),
(5, 'Kepala Bidang', NULL, NULL, NULL, NULL, NULL),
(6, 'Kepala Seksi Kesehatan Keluarga dan Gizi', NULL, NULL, NULL, NULL, NULL),
(7, 'Kepala Seksi Promosi dan Pemberdayaan Kesehatan', NULL, NULL, NULL, NULL, NULL),
(8, 'Kepala Seksi Kesehatan Lingkungan, Kesehatan Kerja dan Olahraga', NULL, NULL, NULL, NULL, NULL),
(9, 'Kepala Seksi Surveilans dan Imunisasi', NULL, NULL, NULL, NULL, NULL),
(10, 'Kepala Seksi Pencegahan dan Pengendalian Penyakit Menular', NULL, NULL, NULL, NULL, NULL),
(11, 'Kepala Seksi Pencegahan dan Pengendalian Penyakit Tidak Menular dan Kesehatan Jiwa', NULL, NULL, NULL, NULL, NULL),
(12, 'Kepala Seksi Pelayanan dan Pembiayaan Kesehatan', NULL, NULL, NULL, NULL, NULL),
(13, 'Kepala Seksi Kefarmasian dan Alat Kesehatan', NULL, NULL, NULL, NULL, NULL),
(14, 'Kepala Seksi Sumber Daya Manusia Kesehatan, Mutu Pelayanan dan Sarana Prasarana Kesehatan', NULL, NULL, NULL, NULL, NULL),
(15, 'Kepala Unit Pelaksana Teknis', NULL, NULL, NULL, NULL, NULL),
(16, 'Fungsional Umum', NULL, NULL, NULL, NULL, NULL),
(17, 'Kepala Subbagian Keuangan', NULL, NULL, NULL, NULL, NULL),
(18, 'Kepala Subbagian Program dan Pelaporan', NULL, NULL, NULL, NULL, NULL),
(19, 'Kepala Seksi Pembinaan Pendidikan Anak Usia Dini', NULL, NULL, NULL, NULL, NULL),
(20, 'Kepala Seksi Pembinaan Pendidikan Masyarakat', NULL, NULL, NULL, NULL, NULL),
(21, 'Kepala Seksi Kurikulum Sekolah Dasar', NULL, NULL, NULL, NULL, NULL),
(22, 'Kepala Seksi Kelembagaan dan Sarana Prasarana Sekolah Dasar', NULL, NULL, NULL, NULL, NULL),
(23, 'Kepala Seksi Peserta Didik Sekolah Dasar', NULL, NULL, NULL, NULL, NULL),
(24, 'Kepala Seksi Kurikulum Sekolah Menengah Pertama', NULL, NULL, NULL, NULL, NULL),
(25, 'Kepala Seksi Kelembagaan dan Sarana Prasarana  Sekolah Menengah Pertama', NULL, NULL, NULL, NULL, NULL),
(26, 'Kepala Seksi Peserta Didik Sekolah Menengah Pertama.\r\nKepala Seksi Peserta Didik Sekolah Menengah Pertama', NULL, NULL, NULL, NULL, NULL),
(27, 'Kepala Seksi Pembinaan Guru dan Tenaga Kependidikan Pendidikan Anak Usia Dini dan Pendidikan Masyarakat', NULL, NULL, NULL, NULL, NULL),
(28, 'Kepala Seksi Pembinaan Guru dan Tenaga Kependidikan SD', NULL, NULL, NULL, NULL, NULL),
(29, 'Kepala Seksi Pembinaan Guru dan Tenaga Kependidikan SMP', NULL, NULL, NULL, NULL, NULL),
(30, 'Kepala  Seksi Pemberdayaan Sosial dan Penanggulangan Kemiskinan', NULL, NULL, NULL, NULL, NULL),
(31, 'Kepala Seksi Perlindungan dan Jaminan Sosial', NULL, NULL, NULL, NULL, NULL),
(32, 'Kepala  Seksi Rehabilitasi Sosial', NULL, NULL, NULL, NULL, NULL),
(33, 'Kepala  Seksi Pengendalian Penduduk, Penyuluhan dan Penggerakan', NULL, NULL, NULL, NULL, NULL),
(34, 'Kepala  Seksi Keluarga Berencana', NULL, NULL, NULL, NULL, NULL),
(35, 'Kepala  Seksi Ketahanan dan Kesejahteraan Keluarga', NULL, NULL, NULL, NULL, NULL),
(36, 'Kepala  Seksi Penguatan Kelembagaan, Data Gender dan Anak', NULL, NULL, NULL, NULL, NULL),
(37, 'Kepala  Seksi Peningkatan Kualitas Hidup dan Perlindungan Perempuan', NULL, NULL, NULL, NULL, NULL),
(38, 'Kepala  Seksi Pemenuhan Hak dan Perlindungan Anak', NULL, NULL, NULL, NULL, NULL),
(39, 'Kepala Seksi Identitas Penduduk', NULL, NULL, NULL, NULL, NULL),
(40, 'Kepala Seksi Pindah Datang Penduduk', NULL, NULL, NULL, NULL, NULL),
(41, 'Kepala Seksi Pendataan Penduduk', NULL, NULL, NULL, NULL, NULL),
(42, 'Kepala Seksi Kelahiran', NULL, NULL, NULL, NULL, NULL),
(43, 'Kepala Seksi Perkawinan dan Perceraian', NULL, NULL, NULL, NULL, NULL),
(44, 'Kepala Seksi Perubahan Status Anak, Pewarganegaraan dan Kematian', NULL, NULL, NULL, NULL, NULL),
(45, 'Kepala Seksi Sistem Informasi Administrasi Kependudukan', NULL, NULL, NULL, NULL, NULL),
(46, 'Kepala Seksi Pengolahan dan Penyajian Data', NULL, NULL, NULL, NULL, NULL),
(47, 'Kepala Seksi Kerjasama dan Inovasi Pelayanan', NULL, NULL, NULL, NULL, NULL),
(48, 'Kepala Seksi Ketersediaan dan Kerawanan Pangan', NULL, NULL, NULL, NULL, NULL),
(49, 'Kepala Seksi Distribusi dan Cadangan Pangan', NULL, NULL, NULL, NULL, NULL),
(50, 'Kepala Seksi Penganekaragaman Konsumsi dan Keamanan Pangan', NULL, NULL, NULL, NULL, NULL),
(51, 'Kepala Seksi Pertanian', NULL, NULL, NULL, NULL, NULL),
(52, 'Kepala Seksi Peternakan dan Kesehatan Hewan', NULL, NULL, NULL, NULL, NULL),
(53, 'Kepala Seksi Perikanan', NULL, NULL, NULL, NULL, NULL),
(54, 'Kepala Unit Pelaksana Teknis (UPT)', NULL, NULL, NULL, NULL, NULL),
(55, 'Kepala Seksi Pengembangan Iklim dan Promosi', NULL, NULL, NULL, NULL, NULL),
(56, 'Kepala Seksi Pengendalian Pelaksanaan', NULL, NULL, NULL, NULL, NULL),
(57, 'Kepala Seksi Data dan Sistem Informasi', NULL, NULL, NULL, NULL, NULL),
(58, 'Kepala Seksi Perizinan Pemanfaatan Ruang', NULL, NULL, NULL, NULL, NULL),
(59, 'Kepala Seksi Perizinan Bangunan', NULL, NULL, NULL, NULL, NULL),
(60, 'Kepala Seksi Administrasi Perizinan Pemanfaatan Ruang dan Bangunan', NULL, NULL, NULL, NULL, NULL),
(61, 'Kepala Seksi Perizinan Perekonomian', NULL, NULL, NULL, NULL, NULL),
(62, 'Kepala Seksi Administrasi Perizinan Perekomomian', NULL, NULL, NULL, NULL, NULL),
(63, 'Kepala Subbagian Program dan Pelaporan', NULL, NULL, NULL, NULL, NULL),
(64, 'Kepala Seksi Publikasi dan Dokumentasi', NULL, NULL, NULL, NULL, NULL),
(65, 'Kepala Seksi Pelayanan Informasi', NULL, NULL, NULL, NULL, NULL),
(66, 'Kepala Seksi Data dan Statistik', NULL, NULL, NULL, NULL, NULL),
(67, 'Kepala Seksi Pengelolaan Infrastruktur dan Teknologi', NULL, NULL, NULL, NULL, NULL),
(68, 'Kepala Seksi Pengembangan Aplikasi dan Layanan Teknologi Informasi dan Komunikasi', NULL, NULL, NULL, NULL, NULL),
(69, 'Kepala Seksi Persandian dan Pengembangan Sumber Daya Telematika', NULL, NULL, NULL, NULL, NULL),
(70, 'Kepala Seksi Pengelolaan Kearsipan', NULL, NULL, NULL, NULL, NULL),
(71, 'Kepala Seksi Layanan dan Promosi Kearsipan', NULL, NULL, NULL, NULL, NULL),
(72, 'Kepala Seksi Pengadaan dan Pengolahan Perpustakaan', NULL, NULL, NULL, NULL, NULL),
(73, 'Kepala Seksi Layanan dan Promosi Perpustakaan', NULL, NULL, NULL, NULL, NULL),
(74, 'Kepala Subbidang Perencanaan Pendapatan dan Sistem Informasi Pajak Daerah', NULL, NULL, NULL, NULL, NULL),
(75, 'Kepala Subbidang Pendaftaran, Pendataan dan Penetapan', NULL, NULL, NULL, NULL, NULL),
(76, 'Kepala Subbidang Pengawasan, Pengendalian dan Penyuluhan Pajak Daerah;\r\nKepala Subbidang Pengawasan, Pengendalian dan Penyuluhan Pajak Daerah', NULL, NULL, NULL, NULL, NULL),
(77, 'Kepala Subbidang Penerimaan, Penagihan dan Keberatan', NULL, NULL, NULL, NULL, NULL),
(78, 'Direktur', NULL, NULL, NULL, NULL, NULL),
(79, 'Wakil Direktur', NULL, NULL, NULL, NULL, NULL),
(80, 'Kepala Subbagian Umum dan Humas', NULL, NULL, NULL, NULL, NULL),
(81, 'Kepala Subbagian Kepegawaian', NULL, NULL, NULL, NULL, NULL),
(82, 'Kepala Subbagian Pelaporan dan SIM RS', NULL, NULL, NULL, NULL, NULL),
(83, 'Kepala Subbagian Program dan Anggaran', NULL, NULL, NULL, NULL, NULL),
(84, 'Kepala Subbagian Perbendaharaan', NULL, NULL, NULL, NULL, NULL),
(85, 'Kepala Subbagian Verifikasi dan Akuntansi', NULL, NULL, NULL, NULL, NULL),
(86, 'Kepala Seksi Pelayanan Medik', NULL, NULL, NULL, NULL, NULL),
(87, 'Kepala Seksi Penujang Medik', NULL, NULL, NULL, NULL, NULL),
(88, 'Kepala Seksi Asuhan Keperawatan', NULL, NULL, NULL, NULL, NULL),
(89, 'Kepala Seksi Pengembangan Mutu Keperawatan', NULL, NULL, NULL, NULL, NULL),
(90, 'Camat', NULL, NULL, NULL, NULL, NULL),
(91, 'Sekretaris Camat', NULL, NULL, NULL, NULL, NULL),
(92, 'Kepala  Seksi Pelayanan Umum', NULL, NULL, NULL, NULL, NULL),
(93, 'Kepala Seksi Pemerintahan Umum, Ketentraman dan Ketertiban Umum', NULL, NULL, NULL, NULL, NULL),
(94, 'Kepala Seksi Ekonomi dan Kesejahteraan Sosial', NULL, NULL, NULL, NULL, NULL),
(95, 'Kepala Seksi Pemberdayaan Masyarakat', NULL, NULL, NULL, NULL, NULL),
(96, 'Kepala Seksi Sarana dan Prasarana Lingkungan', NULL, NULL, NULL, NULL, NULL),
(97, 'Lurah', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jammings`
--

CREATE TABLE `jammings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `stat` int(1) NOT NULL,
  `tgl_mulai` timestamp NOT NULL,
  `tgl_akhir` timestamp NOT NULL,
  `lokasi_ruangan` varchar(100) NOT NULL,
  `luas_ruangan` varchar(50) NOT NULL,
  `kegiatan` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jammings`
--

INSERT INTO `jammings` (`id`, `user_id`, `path`, `stat`, `tgl_mulai`, `tgl_akhir`, `lokasi_ruangan`, `luas_ruangan`, `kegiatan`, `created_at`, `updated_at`) VALUES
(1, 2, '/doc/CLIENT_SERVER_TECHNOLOGY.pdf', 2, '2015-12-31 17:00:00', '2016-01-31 17:00:00', 'ruang tamu', '20', 'kegiatan keluarga', '2019-09-17 06:31:54', '2019-09-19 06:28:38'),
(2, 2, '/doc/pengjauan.pdf', 2, '2019-11-30 23:00:00', '2019-12-20 17:00:00', 'Diskominforarpus', '30', 'rapat pleno', '2020-11-24 06:52:41', '2020-11-24 07:04:14'),
(3, 2, '/doc/pengjauan.pdf', 4, '2015-12-31 17:00:00', '2016-01-24 17:00:00', 'Diskominforarpus', '30', 'untuk rapat', '2020-11-24 07:08:40', '2020-11-24 07:08:55'),
(4, 2, '/doc/laporan-pegawai_16.pdf', 3, '2016-02-10 17:00:00', '2016-02-22 17:00:00', 'Diskominforarpus', '30', 'kegiatan', '2020-11-24 15:04:53', '2020-11-24 15:19:09'),
(5, 2, '/doc/pengjauan_2.pdf', 4, '2016-01-31 20:00:00', '2016-02-25 22:00:00', 'Diskominforarpus', '30', 'kegitan', '2020-11-24 15:17:23', '2020-11-24 15:19:28'),
(6, 2, '/doc/pengjauan_4.pdf', 2, '2016-02-01 17:00:00', '2016-02-17 17:00:00', 'Diskominforarpus', '30', 'keterangan', '2020-11-24 16:51:36', '2020-11-24 16:52:02'),
(7, 2, '/doc/94a953b282283fc5981dde5d30e55909.pdf', 1, '2016-02-10 17:00:00', '2016-03-03 17:00:00', 'Diskominforarpus', '30', 'keterangan', '2020-11-24 16:55:24', '2020-11-24 16:55:24'),
(8, 2, '/doc/layanan/119d0312cc18bf5af9a69faeb7c9a923.pdf', 1, '2016-01-31 17:00:00', '2016-02-08 17:00:00', 'Diskominforarpus', '30', 'baru', '2020-11-24 17:09:12', '2020-11-24 17:09:12'),
(9, 2, '/doc/layanan/f2ae9f48aec7629ada1d9170b02e4542.pdf', 1, '2020-11-24 17:00:00', '2020-12-05 16:00:00', 'Diskominforarpus', '30', 'rapat', '2020-11-25 12:05:29', '2020-11-25 12:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `j_kelamins`
--

CREATE TABLE `j_kelamins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `j_kelamins`
--

INSERT INTO `j_kelamins` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Laki-Laki', NULL, NULL),
(2, 'Perempuan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_01_05_100001_create_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pencabutan_ses`
--

CREATE TABLE `pencabutan_ses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `path` varchar(200) NOT NULL,
  `stat` int(1) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencabutan_ses`
--

INSERT INTO `pencabutan_ses` (`id`, `user_id`, `nama_pemohon`, `path`, `stat`, `created_at`, `updated_at`) VALUES
(1, 2, '', '/doc/a29e259643ddc60c808fee84b0f45ca4.pdf', 1, '2019-09-24 19:38:22', '2019-09-24 19:38:22'),
(2, 2, '', '/doc/#TRANSKRIPT EVALUASI SMART CITY WALI KOTA CIMAHI-dikonversi.pdf', 4, '2020-11-24 06:45:31', '2020-11-24 07:01:22'),
(3, 2, 'jana', '/doc/2812e0ce3c05f3d619f07b4db48a5732.pdf', 2, '2020-11-24 16:48:10', '2020-11-24 16:48:24'),
(4, 2, 'joy', '/doc/pencabutan/ec19d7b31ba5d4bb41ebd59dd07cfb54.pdf', 1, '2020-11-24 17:10:27', '2020-11-24 17:10:27'),
(5, 2, 'jana', '/doc/pencabutan/a6ed2732e7157f0bd8611d16e46822b4.pdf', 1, '2020-11-25 12:04:32', '2020-11-25 12:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_ses`
--

CREATE TABLE `pengajuan_ses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `path` varchar(200) NOT NULL,
  `ktp_path` varchar(200) NOT NULL,
  `stat` int(1) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_ses`
--

INSERT INTO `pengajuan_ses` (`id`, `user_id`, `nama_pemohon`, `path`, `ktp_path`, `stat`, `created_at`, `updated_at`) VALUES
(1, 2, '', '/doc/12DatabaseClientServer.pdf', '/doc/12DatabaseClientServer.pdf', 2, '2019-09-16 09:41:57', '2019-09-19 01:21:26'),
(2, 2, '', '/doc/Bisnis_Digital_-Certificate_342.pdf', '/doc/12DatabaseClientServer.pdf', 2, '2019-09-16 09:46:12', '2019-09-19 01:45:20'),
(3, 2, '', '/doc/705acbdf671d98eef74da58a2f0d79ca.pdf', '/ktp/705acbdf671d98eef74da58a2f0d79ca.pdf', 1, '2019-09-22 08:15:01', '2019-09-22 08:15:01'),
(4, 2, '', '/doc/333551-OpenDataService-APISpecification.pdf', '/ktp/124acca9-e67b-46c3-aecd-0161d6170061.jpg', 1, '2019-09-22 08:16:28', '2019-09-22 08:16:28'),
(5, 2, '', '/doc/Android+Developer+Nanodegree+Syllabus.pdf', '/ktp/9780735626690.pdf', 4, '2019-09-22 08:21:27', '2020-11-24 07:00:40'),
(6, 2, '', '/doc/12 - Database Client Server.pdf', '/ktp/e66a3ba2-8d6a-4f98-8822-200caf07a046.jpg', 2, '2019-09-24 23:22:20', '2020-11-24 07:00:34'),
(7, 2, '', '/doc/Laporan Hasil Mengajar E-Learning Dosen (2) (Recovered) (1).pdf', '/ktp/nik-wn-china-di-e-ktp-terdaftar-atas-nama-bahar-ini-tanggapan-kpu.jpg', 2, '2020-11-02 06:33:07', '2020-11-02 06:34:11'),
(8, 2, '', '/doc/pengjauan_3.pdf', '/ktp/wakilwalikota.jpeg', 1, '2020-11-24 07:38:36', '2020-11-24 07:38:36'),
(9, 2, '', '/doc/laporan-pegawai_16.pdf', '/ktp/wakilwalikota.jpeg', 1, '2020-11-24 07:58:34', '2020-11-24 07:58:34'),
(10, 2, '', '/doc/pengjauan_2.pdf', '/ktp/wakilwalikota.jpeg', 1, '2020-11-24 15:00:36', '2020-11-24 15:00:36'),
(11, 2, 'dony', '/doc/pengjauan_4.pdf', '/ktp/egov-logo1.jpg', 1, '2020-11-24 16:00:14', '2020-11-24 16:00:14'),
(12, 2, 'dona', '/doc/b8e7ab43438838dcb481bcf5a4ba8328.pdf', '/ktp/804dd991b0be21c340bbe5f3077bf213.jpeg', 2, '2020-11-24 16:09:34', '2020-11-24 16:13:25'),
(13, 2, 'jana', '/doc/0cfcc61a3fbbc79c409e31b36f15cdcc.pdf', '/ktp/0b59166d2b2ec7d5c66062378bb5ae0a.jpeg', 1, '2020-11-24 16:39:00', '2020-11-24 16:39:00'),
(14, 2, 'joy', '/doc/pendaftaran/48a27ae7a49f98ec3d0d0c69f39340b6.pdf', '/doc/ktp/b48f314c264f716bdbd352ab3a7f758a.jpeg', 1, '2020-11-24 17:13:17', '2020-11-24 17:13:17'),
(15, 2, 'kiki', '/doc/pendaftaran/21cd6fdffba4cf5b5dc799ea6c41e648.pdf', '/doc/ktp/85ee06f33eeb4e487fbb1c4b62e6c178.jpeg', 2, '2020-11-25 12:01:33', '2020-11-25 12:38:19'),
(16, 2, 'dony', '/doc/pendaftaran/9d28b197b016ad1a677ceb88e3ae3192.pdf', '/doc/ktp/ebcf5a12f156ef19aa2926fcce1b8f86.jpeg', 4, '2020-11-25 12:35:28', '2020-11-25 12:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 2, 'flbwwePDSMqwXgBdrZx5Lf7AuHaSEAqm', '2019-09-16 08:56:55', '2019-09-16 08:56:55'),
(2, 2, 'hatkcrJ4E67UcKnKCVEndMekC3lIfRbb', '2019-09-16 10:39:24', '2019-09-16 10:39:24'),
(3, 2, '0XpVq7uRwX2YtA6GAl9TzaOsQJl0qR3y', '2019-09-17 05:31:35', '2019-09-17 05:31:35'),
(4, 2, 'MhthYzLCBhrMh9Dqok5E5fQ4EQWVkIlm', '2019-09-17 18:17:30', '2019-09-17 18:17:30'),
(13, 1, 'fgS6ZphV3qDAorgTfmIfTUohKSjigyXc', '2019-09-18 06:48:24', '2019-09-18 06:48:24'),
(15, 1, 'bhRvOuWzo83hRaMMTbXCk0GjZc7W0M8B', '2019-09-18 06:59:03', '2019-09-18 06:59:03'),
(19, 1, 'YXULj9z53lgV288MnDUpHDYwY3KA7F7Y', '2019-09-19 05:40:33', '2019-09-19 05:40:33'),
(21, 1, 'PeZLF0tHuAjPKyvCX6nQW2gq6j7QIe0Q', '2019-09-22 04:36:54', '2019-09-22 04:36:54'),
(25, 1, 'e0ys85hX5wGJxL1L6fP07b5tgIRup8yu', '2019-09-22 08:50:33', '2019-09-22 08:50:33'),
(26, 1, 'DT70oIRYxKHw4n7F4SZDBgHze73tx3xp', '2019-09-24 07:55:25', '2019-09-24 07:55:25'),
(27, 1, '2XGR4NyiiLg7BMZG15telqlRx6YOst8y', '2019-09-24 09:11:39', '2019-09-24 09:11:39'),
(31, 1, 'nH3uFGXpwqpsnIM0FOCQMYKONJDQBWU4', '2019-10-01 01:19:00', '2019-10-01 01:19:00'),
(34, 1, 'VMZWIjB1GapnwZI5azA8f25uPPWCKlvC', '2019-10-02 21:10:35', '2019-10-02 21:10:35'),
(36, 2, 'zrjz3TNHXZyF3DfW1mlbBJ5vfFq0ia4e', '2019-10-07 06:22:47', '2019-10-07 06:22:47'),
(37, 1, 'N4bvrhMjzNi2sDLT4lAKgNTjBY3aVviA', '2020-11-10 06:46:31', '2020-11-10 06:46:31'),
(38, 1, 'DyLFP0tzNAM1PUz2bKnNZi4qAkVLoVM6', '2020-11-11 07:32:48', '2020-11-11 07:32:48'),
(40, 13, 'Bnzv8tgPyuV5FrTHPSMuwHsrPCesKmLF', '2020-11-16 05:34:05', '2020-11-16 05:34:05'),
(41, 13, 'qEi4R10bxbEdT7CGwDMDyNN2b2Mv8osj', '2020-11-16 05:36:33', '2020-11-16 05:36:33'),
(42, 1, 'OvL1Tio1K0GUQpvpd12RoEhmJkmeCo2T', '2020-11-16 05:40:53', '2020-11-16 05:40:53'),
(43, 13, 'InGdQyOVTjZavP2fZE1RDtITwYSmoH45', '2020-11-16 05:42:19', '2020-11-16 05:42:19'),
(44, 14, 'SHtrMd9aKlR3MAmZapPVVmOeAolXBYtn', '2020-11-16 05:46:13', '2020-11-16 05:46:13'),
(45, 14, '1gmvb3qBpyioI5KeOyAZejQB5kzcmzGZ', '2020-11-16 05:47:34', '2020-11-16 05:47:34'),
(46, 13, '4jAZvN2knwoMkvrwmOCi3wlhlQvdULYq', '2020-11-16 05:48:23', '2020-11-16 05:48:23'),
(47, 13, 'o4zqAjNOmFZKdWyLMHxKXBlnVMOQiKyE', '2020-11-16 05:51:13', '2020-11-16 05:51:13'),
(48, 13, 'ryZaZzhulaus6nDngKismL97PlkbQOiF', '2020-11-16 05:51:36', '2020-11-16 05:51:36'),
(49, 13, 'sdtnyblwZUtJ04pYEhDScBpytDvVvsYo', '2020-11-16 05:52:50', '2020-11-16 05:52:50'),
(55, 1, 'KNCD6CIvcMQItH23mcv2aypNItB7Jd4b', '2020-11-16 06:52:01', '2020-11-16 06:52:01'),
(64, 1, 'jScby9bEMSdrzqM5nK7paYsGxs9gbI2D', '2020-11-17 07:45:44', '2020-11-17 07:45:44'),
(65, 1, '6OHwzk4qSvtmvhIwTwESZjXavANX2zWE', '2020-11-18 06:48:00', '2020-11-18 06:48:00'),
(66, 1, 'TRxfB1lsH44HE1V4JyzkC54tLUV5xPCB', '2020-11-18 14:41:09', '2020-11-18 14:41:09'),
(67, 1, 'sFv5p27EV1TBWxWXym8ubB0pCaSQ7AV2', '2020-11-20 20:26:13', '2020-11-20 20:26:13'),
(68, 1, 'EBJlG9JO5zQaYriFO24ObsgXcQXEmFlv', '2020-11-24 06:27:40', '2020-11-24 06:27:40'),
(71, 1, 'LhC4TozFLakZRxU8i7bNt4ErpSEw6ZJ1', '2020-11-24 07:25:45', '2020-11-24 07:25:45'),
(73, 2, 'wdjygDorpKkgwPTjnqVKpSKKaEcGrdeF', '2020-11-24 07:36:21', '2020-11-24 07:36:21'),
(76, 1, '3lkVr9mFwQWss9GnBlearRIskQFyX7eF', '2020-11-24 17:34:41', '2020-11-24 17:34:41'),
(82, 1, 'cAf00wPg5eWve8rLv4TTPED0qlLCELtr', '2020-11-25 12:24:42', '2020-11-25 12:24:42'),
(86, 2, 'Em8w3cA5Qn6UxzZV1NoOWscCWgMybDFd', '2020-11-25 13:37:16', '2020-11-25 13:37:16'),
(88, 1, 'xM7u8cU1XH0EVmZyxtmr3yXY18c3CM42', '2020-11-26 15:18:25', '2020-11-26 15:18:25'),
(90, 13, 'kCfTqDwMLbqng1h7XTxdgREqcMHga0Rp', '2020-11-26 16:14:15', '2020-11-26 16:14:15'),
(91, 1, 'qw5WHojgLJLvgkV1zalXC0MWmLfglTNl', '2020-11-27 13:56:58', '2020-11-27 13:56:58'),
(92, 1, 's1Is66kLrl71ksLi1wN4qBxVjfILof5e', '2020-11-28 11:40:40', '2020-11-28 11:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `perubahan_ses`
--

CREATE TABLE `perubahan_ses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `path` varchar(200) NOT NULL,
  `stat` int(1) NOT NULL,
  `jabatan_lama` varchar(200) DEFAULT NULL,
  `jabatan_baru` varchar(200) DEFAULT NULL,
  `instansi_lama` varchar(200) DEFAULT NULL,
  `instansi_baru` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perubahan_ses`
--

INSERT INTO `perubahan_ses` (`id`, `user_id`, `nama_pemohon`, `path`, `stat`, `jabatan_lama`, `jabatan_baru`, `instansi_lama`, `instansi_baru`, `created_at`, `updated_at`) VALUES
(1, 2, '', '/doc/5ce4a289d45bb576224241.pdf', 1, 'Kasi', 'Kabid', 'Diskominfoarpus', 'Disparpora', '2019-09-24 19:34:37', '2019-09-24 19:34:37'),
(2, 2, '', '/doc/#TRANSKRIPT EVALUASI SMART CITY WALI KOTA CIMAHI-dikonversi.pdf', 2, 'Kasi', 'Kabis', 'Disdik', 'Diskominfoarpus', '2020-11-24 06:43:28', '2020-11-24 07:00:56'),
(3, 2, '', '/doc/pengjauan_2.pdf', 1, 'Kasi', 'Kadis', 'Disdik', 'Diskominfoarpus', '2020-11-24 15:02:32', '2020-11-24 15:02:32'),
(4, 2, 'dony', '/doc/c0d5c53f03c6fbf5d9cbe0d34f7c0b03.pdf', 1, 'Kasi', 'Kabis', 'Disdik', 'Diskominfoarpus', '2020-11-24 16:32:25', '2020-11-24 16:32:25'),
(5, 2, 'dona', '/doc/70c44604c564b455dff5bbbf14754fbd.pdf', 2, 'Kasi', 'Kabid', 'Disdik', 'Diskominfoarpus', '2020-11-24 16:32:44', '2020-11-24 16:33:27'),
(6, 2, 'donal', '/doc/034d98a02e8ffec11013d27cb566cb87.pdf', 1, 'Kasi', 'Kabid', 'Disdik', 'Diskominfoarpus', '2020-11-24 16:39:56', '2020-11-24 16:39:56'),
(7, 2, 'donal joy', '/doc/perubahan/8e746c88207c4536c004fc2b670428a4.pdf', 1, 'Kasi', 'Kabid', 'Disdik', 'Diskominfoarpus', '2020-11-24 17:12:52', '2020-11-24 17:12:52'),
(8, 2, 'herna', '/doc/perubahan/89a522d5d1183084046a60a7513cd21e.pdf', 1, 'Kasi', 'Kabis', 'Disdik', 'Diskominfoarpus', '2020-11-25 12:04:04', '2020-11-25 12:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, NULL, NULL),
(2, 'user', 'User', NULL, NULL, NULL),
(3, 'teknisi_aplikasi', 'Teknisi Aplikasi', NULL, NULL, NULL),
(4, 'teknisi_jaringan', 'Teknisi Jaringan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-09-05 08:40:25', '2020-12-01 01:30:49'),
(2, 2, '2019-09-16 08:38:10', '2020-12-01 01:31:29'),
(3, 2, '2020-11-03 19:05:33', '2020-11-03 19:05:33'),
(13, 3, '2020-11-10 08:46:57', '2020-11-10 08:47:13'),
(14, 4, '2020-11-10 08:48:03', '2020-11-10 08:48:03'),
(15, 1, '2020-11-11 07:53:37', '2020-11-20 21:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `screenshoots`
--

CREATE TABLE `screenshoots` (
  `id` int(11) NOT NULL,
  `incident_id` int(11) NOT NULL,
  `path` varchar(400) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screenshoots`
--

INSERT INTO `screenshoots` (`id`, `incident_id`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, '/doc/12 - Database Client Server.pdf', '2019-09-17 07:50:32', '2019-09-17 07:50:32'),
(2, 2, '/doc/jurnal_11830.pdf', '2020-11-03 18:55:34', '2020-11-03 18:55:34'),
(3, 3, '/doc/a31f0d372548f4253585167e9834e718.pdf', '2020-11-16 06:01:59', '2020-11-16 06:01:59'),
(4, 4, '/doc/pengumuman-cpns-cimahi-2019-2.jpg', '2020-11-16 06:07:15', '2020-11-16 06:07:15'),
(5, 5, '/doc/pengumuman-cpns-cimahi-2019-2.jpg', '2020-11-17 05:50:18', '2020-11-17 05:50:18'),
(6, 6, '/doc/HKN_1575118694.png', '2020-11-17 05:51:01', '2020-11-17 05:51:01'),
(7, 7, '/doc/wakilwalikota.jpeg', '2020-11-24 06:55:41', '2020-11-24 06:55:41'),
(8, 8, '/doc/egov-logo1.jpg', '2020-11-24 06:59:25', '2020-11-24 06:59:25'),
(9, 9, '/doc/egov-logo1.jpg', '2020-11-24 06:59:51', '2020-11-24 06:59:51'),
(10, 10, '/doc/wakilwalikota.jpeg', '2020-11-24 15:36:12', '2020-11-24 15:36:12'),
(11, 10, '/doc/walikota.jpeg', '2020-11-24 15:36:12', '2020-11-24 15:36:12'),
(12, 11, '/doc/egov-logo1.jpg', '2020-11-24 15:42:43', '2020-11-24 15:42:43'),
(13, 12, '/doc/incident62a182670113f4b7f783e8e05841812c.jpeg', '2020-11-24 17:05:10', '2020-11-24 17:05:10'),
(14, 12, '/doc/incidentf5aa0c83f36446bc2365c9b245ff8d5f.jpeg', '2020-11-24 17:05:10', '2020-11-24 17:05:10'),
(15, 13, '/doc/incident/f7324dd92edfca90ec9356bf207dc8af.jpeg', '2020-11-24 17:07:18', '2020-11-24 17:07:18'),
(16, 13, '/doc/incident/e6e92d3e93e5bafa90116863290ff8f4.jpeg', '2020-11-24 17:07:18', '2020-11-24 17:07:18'),
(17, 14, '/doc/incident/d071edd5e425bab1e1ac4f51f9d154e5.jpeg', '2020-11-25 12:48:23', '2020-11-25 12:48:23'),
(18, 14, '/doc/incident/72b4f2c7aa7753c300bbff0247c89ff6.jpeg', '2020-11-25 12:48:23', '2020-11-25 12:48:23'),
(19, 15, '/doc/incident/48e56bd7da33d7ac624960fea470163a.png', '2020-11-26 16:04:59', '2020-11-26 16:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(44, NULL, 'global', NULL, '2020-11-03 19:15:59', '2020-11-03 19:15:59'),
(45, NULL, 'ip', '127.0.0.1', '2020-11-03 19:15:59', '2020-11-03 19:15:59'),
(46, 1, 'user', NULL, '2020-11-03 19:15:59', '2020-11-03 19:15:59'),
(47, NULL, 'global', NULL, '2020-11-03 19:20:10', '2020-11-03 19:20:10'),
(48, NULL, 'ip', '127.0.0.1', '2020-11-03 19:20:10', '2020-11-03 19:20:10'),
(49, 1, 'user', NULL, '2020-11-03 19:20:10', '2020-11-03 19:20:10'),
(50, NULL, 'global', NULL, '2020-11-10 06:45:48', '2020-11-10 06:45:48'),
(51, NULL, 'ip', '127.0.0.1', '2020-11-10 06:45:48', '2020-11-10 06:45:48'),
(52, 1, 'user', NULL, '2020-11-10 06:45:48', '2020-11-10 06:45:48'),
(53, NULL, 'global', NULL, '2020-11-11 07:32:37', '2020-11-11 07:32:37'),
(54, NULL, 'ip', '127.0.0.1', '2020-11-11 07:32:37', '2020-11-11 07:32:37'),
(55, 1, 'user', NULL, '2020-11-11 07:32:37', '2020-11-11 07:32:37'),
(56, NULL, 'global', NULL, '2020-11-16 05:35:42', '2020-11-16 05:35:42'),
(57, NULL, 'ip', '127.0.0.1', '2020-11-16 05:35:42', '2020-11-16 05:35:42'),
(58, 13, 'user', NULL, '2020-11-16 05:35:42', '2020-11-16 05:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerjas`
--

CREATE TABLE `unit_kerjas` (
  `id` int(11) NOT NULL,
  `nama_unker` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_kerjas`
--

INSERT INTO `unit_kerjas` (`id`, `nama_unker`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Bidang Penyelenggaraan E-Government dan Persandian', NULL, NULL, 0, 0),
(2, 'Sekretariat Dinas', NULL, NULL, 0, 0),
(3, 'Bidang Bina Kesehatan Masyarakat.\r\n', NULL, NULL, 0, 0),
(4, 'Bidang Pencegahan dan Pengendalian Penyakit.\r\n', NULL, NULL, 0, 0),
(5, 'Bidang Pelayanan dan Sumber Daya Kesehatan.\r\n', NULL, NULL, 0, 0),
(6, 'Bidang Pembinaan Pendidikan Anak Usia Dini dan Pendidikan Masyarakat.\r\n', NULL, NULL, 0, 0),
(7, 'Bidang Pembinaan Sekolah Dasar.\r\n', NULL, NULL, 0, 0),
(8, 'Bidang Pembinaan Sekolah Menengah Pertama.\r\n', NULL, NULL, 0, 0),
(9, 'Bidang Pembinaan Guru dan Tenaga Kependidikan.\r\n', NULL, NULL, 0, 0),
(10, 'Bidang Sosial\r\n', NULL, NULL, 0, 0),
(11, 'Bidang Pengendalian Penduduk dan Keluarga Berencana\r\n', NULL, NULL, 0, 0),
(12, 'Bidang Pemberdayaan Perempuan dan Perlindungan Anak\r\n', NULL, NULL, 0, 0),
(13, 'Bidang Pelayanan Pendaftaran Penduduk\r\n', NULL, NULL, 0, 0),
(14, 'Bidang Pelayanan Pencatatan Sipil\r\n', NULL, NULL, 0, 0),
(15, 'Bidang Pengelolaan Informasi Administrasi Kependudukan dan Pemanfaatan Data', NULL, NULL, 0, 0),
(16, 'Bidang Ketahanan Pangan\r\n', NULL, NULL, 0, 0),
(17, 'Bidang Pertanian dan Perikanan\r\n', NULL, NULL, 0, 0),
(18, 'Bidang Penanaman Modal\r\n', NULL, NULL, 0, 0),
(19, 'Bidang Pelayanan Perizinan Pembangunan\r\n', NULL, NULL, 0, 0),
(20, 'Bidang Pelayanan Perizinan Perekonomian\r\n', NULL, NULL, 0, 0),
(21, 'Bidang Informasi, Komunikasi Publik dan Statistik\r\n', NULL, NULL, 0, 0),
(22, 'Bidang Kearsipan', NULL, NULL, 0, 0),
(23, 'Bidang Perpustakaan', NULL, NULL, 0, 0),
(24, 'Sekretariat Badan \r\n\r\n', NULL, NULL, 0, 0),
(25, 'Bidang Identifikasi Pendapatan\r\n', NULL, NULL, 0, 0),
(26, 'Bidang Penerimaan dan Pengendalian Pendapatan\r\n', NULL, NULL, 0, 0),
(27, 'Wakil Direktur Administrasi Umum dan Keuangan.\r\n', NULL, NULL, 0, 0),
(28, 'Wakil Direktur Pelayanan \r\n', NULL, NULL, 0, 0),
(29, 'Bagian Administrasi Umum\r\n', NULL, NULL, 0, 0),
(30, 'Bagian Keuangan\r\n', NULL, NULL, 0, 0),
(31, 'Bidang Pelayanan dan Penunjang Medik\r\n', NULL, NULL, 0, 0),
(32, 'Bidang Keperawatan\r\n', NULL, NULL, 0, 0),
(33, 'Kelurahan\r\n', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_id` int(3) NOT NULL,
  `jabatan_id` int(3) NOT NULL,
  `hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_kerja_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `nik`, `nama`, `golongan_id`, `jabatan_id`, `hp`, `jenis_kelamin`, `instansi_id`, `unit_kerja_id`, `email`, `password`, `permissions`, `last_login`, `created_at`, `updated_at`) VALUES
(1, '198609262015051001', '1234567890', 'Super Admin', 1, 1, '082116660230', '1', '1', '1', 'admin@email.com', '$2y$12$a4OPqkAHXvA9ydvB.PdEZOiSLIvjuKzca6cN4.1P2WEtVxhGw7D3y', NULL, '2020-12-01 01:30:26', '2019-09-05 08:40:24', '2020-12-01 01:30:49'),
(2, '198609262015051002', '0987654321', 'Skpd Diskominfo', 1, 1, '082116660230', '1', '1', '1', 'skpd@email.com', '$2y$12$a4OPqkAHXvA9ydvB.PdEZOiSLIvjuKzca6cN4.1P2WEtVxhGw7D3y', NULL, '2020-11-26 16:04:05', '2019-09-05 08:40:24', '2020-12-01 01:31:29'),
(13, '198609262015051004', '123123123', 'Teknisi Aplikasi', 1, 13, '082116660230', '1', '1', '3', 'teknisiaplikasi@gmail.com', '$2y$12$a4OPqkAHXvA9ydvB.PdEZOiSLIvjuKzca6cN4.1P2WEtVxhGw7D3y', NULL, '2020-11-26 16:14:15', '2020-11-10 08:46:57', '2020-11-26 16:14:15'),
(14, '198609262015051003', '1234', 'Teknisi Jaringan', 1, 12, '082116660230', '1', '1', '9', 'teknisijaringan@gmail.com', '$2y$12$a4OPqkAHXvA9ydvB.PdEZOiSLIvjuKzca6cN4.1P2WEtVxhGw7D3y', NULL, '2020-11-24 07:17:12', '2020-11-10 08:48:03', '2020-11-24 07:17:12');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_golongan`
-- (See below for the actual view)
--
CREATE TABLE `user_golongan` (
`nama` varchar(100)
,`nik` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_golongan_1`
-- (See below for the actual view)
--
CREATE TABLE `user_golongan_1` (
`nama` varchar(100)
,`nik` varchar(50)
,`password` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_golongan_id`
-- (See below for the actual view)
--
CREATE TABLE `user_golongan_id` (
`nama` varchar(100)
,`nik` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `user_golongan`
--
DROP TABLE IF EXISTS `user_golongan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_golongan`  AS  select `users`.`nama` AS `nama`,`users`.`nik` AS `nik` from `users` ;

-- --------------------------------------------------------

--
-- Structure for view `user_golongan_1`
--
DROP TABLE IF EXISTS `user_golongan_1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_golongan_1`  AS  select `users`.`nama` AS `nama`,`users`.`nik` AS `nik`,`users`.`password` AS `password` from `users` ;

-- --------------------------------------------------------

--
-- Structure for view `user_golongan_id`
--
DROP TABLE IF EXISTS `user_golongan_id`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_golongan_id`  AS  select `users`.`nama` AS `nama`,`users`.`nik` AS `nik` from `users` where (`users`.`golongan_id` = '1') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`),
  ADD UNIQUE KEY `clients_api_token_unique` (`api_token`);

--
-- Indexes for table `golongans`
--
ALTER TABLE `golongans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instansis`
--
ALTER TABLE `instansis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jammings`
--
ALTER TABLE `jammings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `j_kelamins`
--
ALTER TABLE `j_kelamins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pencabutan_ses`
--
ALTER TABLE `pencabutan_ses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_ses`
--
ALTER TABLE `pengajuan_ses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `perubahan_ses`
--
ALTER TABLE `perubahan_ses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `screenshoots`
--
ALTER TABLE `screenshoots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `unit_kerjas`
--
ALTER TABLE `unit_kerjas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golongans`
--
ALTER TABLE `golongans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `incidents`
--
ALTER TABLE `incidents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `instansis`
--
ALTER TABLE `instansis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `jammings`
--
ALTER TABLE `jammings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `j_kelamins`
--
ALTER TABLE `j_kelamins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pencabutan_ses`
--
ALTER TABLE `pencabutan_ses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengajuan_ses`
--
ALTER TABLE `pengajuan_ses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `perubahan_ses`
--
ALTER TABLE `perubahan_ses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `screenshoots`
--
ALTER TABLE `screenshoots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `unit_kerjas`
--
ALTER TABLE `unit_kerjas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
